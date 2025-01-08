<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'quantity'];

    public function getCartByUser($userId)
    {
        return $this->select('cart.*, products.name_product as product_name, products.price, products.image')
                    ->join('products', 'products.id = cart.product_id')
                    ->where('cart.user_id', $userId)
                    ->findAll();
    }
    public function getCartByUserId($userId)
    {
        return $this->db->table('cart')
            ->select('cart.*, products.name_product as product_name, products.price as product_price')
            ->join('products', 'products.id = cart.product_id')
            ->where('cart.user_id', $userId)
            ->get()
            ->getResultArray();
    }

    public function getCartWithPrices($userId, $selectedItems)
{
    return $this->db->table('cart')
        ->select('cart.id, cart.quantity, products.price as product_price')
        ->join('products', 'products.id = cart.product_id') // Gabungkan dengan tabel products
        ->where('cart.user_id', $userId)
        ->whereIn('cart.id', $selectedItems)
        ->get()
        ->getResultArray();
}

//     public function getCartWithProductDetails($cartIds)
// {
//     return $this->db->table('cart')
//         ->select('cart.*, products.name_product as product_name, products.price as product_price')
//         ->join('products', 'products.id = cart.product_id')
//         ->whereIn('cart.id', $cartIds)
//         ->get()
//         ->getResultArray();
// }

    

public function clearCartByUserId($userId)
{
    return $this->where('user_id', $userId)->delete();
}


}
