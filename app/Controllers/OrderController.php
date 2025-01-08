<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderDetailModel;

class OrderController extends BaseController
{
    protected $orderModel;
    protected $orderDetailModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderDetailModel = new OrderDetailModel();
    }

        public function index()
    {
        $userId = session()->get('user_id');
        // Ambil semua pesanan berdasarkan user_id
        $orders = $this->orderModel->where('user_id', $userId)->findAll();

        // Ambil detail dari setiap pesanan dengan nama produk
        foreach ($orders as &$order) {
            $order['details'] = $this->orderDetailModel->getDetailsWithProductName($order['id']);
        }
        // Ambil semua pesanan berdasarkan user_id
        // $orders = $this->orderDetailModel->getDetailsWithProductName($orderId);
        // // dd($orders);
        // // Ambil detail dari setiap pesanan dengan nama produk
        // foreach ($orders as &$order) {
        //     $order['details'] = $this->orderModel->getOrderDetails($order['user_id']);
        // }

        $data = [
            'orders' => $orders
        ];

        return view('cart/orders', $data);
    }

    public function pay()
{
    $orderId = $this->request->getPost('order_id');
    $paymentMethod = $this->request->getPost('payment_method');

    if (!$orderId || !$paymentMethod) {
        return redirect()->back()->with('error', 'Metode pembayaran harus dipilih.');
    }

    // Update status pesanan menjadi "paid"
    $this->orderModel->update($orderId, [
        'payment_status' => 'paid',
        'payment_method' => $paymentMethod,
        'order_date' => date('Y-m-d H:i:s'),
    ]);
    session()->setFlashdata('pesan', 'Pembayaran berhasil!');
    return redirect()->back();
}

}
