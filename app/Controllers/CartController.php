<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;

class CartController extends BaseController
{
    protected $cartModel;
    protected $orderModel;
    protected $orderDetailModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->orderModel = new OrderModel();
        $this->orderDetailModel = new OrderDetailModel();
    }

    public function index()
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Anda harus login untuk melihat keranjang.');
        }

        $cartItems = $this->cartModel->getCartByUser($userId);
        return view('cart/index', ['cartItems' => $cartItems]);
    }

    public function add()
    {
        $userId = session()->get('user_id');
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity', FILTER_VALIDATE_INT);

        if ($userId && $productId && $quantity) {
            $existingItem = $this->cartModel
                ->where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($existingItem) {
                $this->cartModel->update($existingItem['id'], [
                    'quantity' => $existingItem['quantity'] + $quantity,
                ]);
            } else {
                $this->cartModel->insert([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);
            }
            session()->setFlashdata('pesan', 'barang berhasil ditambahkan!');
            return redirect()->back();
        }

        return redirect()->back()->with('error', 'Gagal menambahkan produk ke keranjang.');
    }

    public function update()
    {
        $cartId = $this->request->getPost('cart_id');
        $quantity = $this->request->getPost('quantity', FILTER_VALIDATE_INT);

        if ($cartId && $quantity) {
            $this->cartModel->update($cartId, ['quantity' => $quantity]);
            return redirect()->to('/cart')->with('success', 'Keranjang berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Gagal memperbarui keranjang.');
    }

    public function delete($id)
    {
        if ($id) {
            $this->cartModel->delete($id);
            return redirect()->to('/cart')->with('success', 'Item berhasil dihapus dari keranjang.');
        }

        return redirect()->back()->with('error', 'Gagal menghapus item dari keranjang.');
    }

    public function checkout()
{
    $selectedItems = $this->request->getPost('selected_items');

    if (empty($selectedItems)) {
        return redirect()->back()->with('error', 'Silakan pilih barang yang ingin di-checkout.');
    }

    $userId = session()->get('user_id');
    $cartItems = $this->cartModel->getCartByUserId(session()->get('user_id'));

    // $cartItems = $this->cartModel->getCartWithPrices($userId, $selectedItems);
    // dd($cartItems);

    // Hitung total harga
    $totalAmount = array_reduce($cartItems, function ($sum, $item) {
        return $sum + ($item['product_price'] * $item['quantity']);
    }, 0);

    // Simpan pesanan
    $orderId = $this->orderModel->insert([
        'user_id' => $userId,
        'total_amount' => $totalAmount,
        'payment_status' => 'unpaid'
    ]);

    foreach ($cartItems as $item) {
        $orderDetailData = [
            'order_id' => $orderId,
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price' => $item['product_price'],
        ];
        $this->orderDetailModel->insert($orderDetailData);
    }

    // Simpan detail pesanan
    // foreach ($cartItems as $item) {
    //     $this->orderDetailModel->insert([
    //         'order_id' => $orderId,
    //         'product_id' => $item['id'],
    //         'quantity' => $item['quantity'],
    //         'price' => $item['product_price']
    //     ]);
    // }

    // Hapus barang yang di-checkout dari keranjang
    $this->cartModel->whereIn('id', $selectedItems)->delete();

    session()->setFlashdata('pesan', 'Pesanan anda berhasil diproses');
    return redirect()->to('cart/orders');
}

public function updateQuantity()
{
    if ($this->request->isAJAX()) {
        $cartId = $this->request->getJSON()->cart_id;
        $quantity = $this->request->getJSON()->quantity;

        if ($quantity < 1) {
            return $this->response->setJSON(['success' => false, 'message' => 'Quantity tidak valid']);
        }

        $update = $this->cartModel->update($cartId, ['quantity' => $quantity]);

        if ($update) {
            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui jumlah']);
    }
    throw new \CodeIgniter\Exceptions\PageNotFoundException();
}

}
