<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\ProductModel;

class OrderController extends BaseController
{
    protected $orderModel;
    protected $orderDetailModel;
    protected $productModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderDetailModel = new OrderDetailModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $userId = session()->get('user_id');
    
        // Ambil semua pesanan berdasarkan user_id dan urutkan berdasarkan 'id' dari yang terbaru ke yang lama
        $orders = $this->orderModel
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')  // Urutkan berdasarkan 'id' dari yang terbaru ke yang lama
            ->findAll();
    
        // Ambil detail dari setiap pesanan dengan nama produk
        foreach ($orders as &$order) {
            $order['details'] = $this->orderDetailModel->getDetailsWithProductName($order['id']);
        }
    
        $data = [
            'orders' => $orders
        ];
    
        return view('cart/orders', $data);
    }
    

    public function pay()
    {
        $orderId = $this->request->getPost('order_id');
        $paymentMethod = $this->request->getPost('payment_method');
        $quantity = $this->request->getPost('quantity');
    
        if (!$orderId || !$paymentMethod) {
            return redirect()->back()->with('error', 'Metode pembayaran harus dipilih.');
        }
    
        // Ambil detail pesanan untuk mendapatkan produk dan quantity
        $orderDetails = $this->orderDetailModel->where('order_id', $orderId)->findAll();
    
        foreach ($orderDetails as $detail) {
            $productId = $detail['product_id'];
            $orderedQuantity = $detail['quantity'];
    
            // Ambil data produk berdasarkan product_id
            $product = $this->productModel->find($productId);
    
            // Pastikan stok cukup untuk mengurangi quantity
            if ($product['stock'] >= $orderedQuantity) {
                // Kurangi stok produk sesuai dengan quantity
                $newStock = $product['stock'] - $orderedQuantity;
    
                // Update stok produk
                $this->productModel->update($productId, [
                    'stock' => $newStock
                ]);
            } else {
                // Jika stok tidak mencukupi, tampilkan pesan error
                return redirect()->back()->with('error', 'Stok tidak mencukupi untuk produk: ' . $product['name_product']);
            }
        }
    
        // Update status pesanan menjadi "paid"
        $this->orderModel->update($orderId, [
            'payment_status' => 'paid',
            'payment_method' => $paymentMethod,
            'order_date' => date('Y-m-d H:i:s'),
        ]);
    
        // Set flash message untuk pembayaran sukses
        session()->setFlashdata('pesan', 'Pembayaran berhasil!');
    
        // Redirect ke halaman sebelumnya
        return redirect()->back();
    }
    

}
