<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
 
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name_product', 'description', 'image','price', 'category_id', 'stock'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getProductsWithCategory($categoryId = null)
    {
        $builder = $this->db->table('products');
        $builder->select('products.*, categories.name_category as name_category');
        $builder->join('categories', 'categories.id = products.category_id');
        
        if (!empty($categoryId)) {
            $builder->where('products.category_id', $categoryId);
        }
    
        // Debug query
        // $sql = $builder->getCompiledSelect();
        // echo $sql; exit; // Menampilkan SQL query yang dihasilkan
        
        return $builder->get()->getResultArray();
    }
    
    public function countProducts()
    {
        return $this->countAll();
    }
}
