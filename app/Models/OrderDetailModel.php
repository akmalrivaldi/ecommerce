<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'product_id', 'quantity', 'price'];

    public function getDetailsWithProductName($orderId)
    {
        return $this->select('order_details.*, products.name_product as product_name')
            ->join('products', 'products.id = order_details.product_id')
            ->where('order_id', $orderId)
            ->findAll();
    }
}
