<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'order_date', 'total_amount', 'payment_status', 'payment_method'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


public function countOrders()
{
        return $this->countAll();
}


    public function getOrderDetails($userId)
{
    $builder = $this->db->table('orders')
        ->select('orders.id as order_id, orders.total_amount, orders.payment_status, 
                  order_details.product_id, order_details.quantity, 
                  products.name_product as product_name, products.price as product_price')
        ->join('order_details', 'order_details.order_id = orders.id') // Gabungkan order_items
        ->join('products', 'products.id = order_details.product_id') // Gabungkan products
        ->where('orders.user_id', $userId);

    return $builder->get()->getResultArray();
}

public function getUserOrders($userId)
{
    return $this->db->table('orders')
                    ->where('user_id', $userId)
                    ->get()
                    ->getResultArray();
}


}
