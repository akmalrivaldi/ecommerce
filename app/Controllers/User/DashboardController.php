<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class DashboardController extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
{
    // // Ambil parameter dari request GET
    $search = $this->request->getGet('search');
    // $category = $this->request->getGet('category');
    $filter = $this->request->getGet('filter');

    // Mulai query dasar
    $query = $this->productModel->select('products.*, categories.name_category')
        ->join('categories', 'products.category_id = categories.id', 'left');

    // Tambahkan kondisi jika ada parameter pencarian
    if (!empty($search)) {
        $query->like('products.name_product', $search);
    }

    // // Tambahkan kondisi jika ada filter kategori
    // if (!empty($category)) {
    //     $query->where('products.category_id', $category);
    // }

    // Tambahkan kondisi jika ada filter alfabet
    // if (!empty($filter)) {
    //     $query->like('products.name_product', $filter . '%'); // Mencari nama produk yang dimulai dengan filter
    // }

    // Eksekusi query dan ambil hasilnya
    $data['products'] = $query->findAll();
    $data['categories'] = $this->categoryModel->findAll();
    $data['search'] = $search;
    // $data['category'] = $category;
    $data['filter'] = $filter;

    // Tampilkan view dengan data
    return view('user/dashboard', $data);
}

    
}
