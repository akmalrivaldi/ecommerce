<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CartModel;

class CartController extends BaseController
{
    protected $cartModel;
    protected $productModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $userId = session()->get('user_id'); // Assuming user session stores user_id
        $data['cartItems'] = $this->cartModel->getCartItemsByUser($userId);

        return view('user/cart', $data);
    }

    public function add()
    {
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity') ?: 1;

        $userId = session()->get('user_id');

        $existingItem = $this->cartModel->where('user_id', $userId)->where('product_id', $productId)->first();

        if ($existingItem) {
            $this->cartModel->update($existingItem['id'], [
                'quantity' => $existingItem['quantity'] + $quantity
            ]);
        } else {
            $this->cartModel->insert([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }

        return redirect()->to('/user/cart');
    }

    public function remove($id)
    {
        $this->cartModel->delete($id);
        return redirect()->to('/user/cart');
    }

    public function clear()
    {
        $userId = session()->get('user_id');
        $this->cartModel->where('user_id', $userId)->delete();

        return redirect()->to('/user/cart');
    }
}
