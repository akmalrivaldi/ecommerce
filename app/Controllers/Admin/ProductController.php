<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends BaseController
{
    protected $productModel, $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
       // Ambil ID kategori dari query parameter (?category_id=...)
    $categoryId = $this->request->getGet('category_id');
    
    // Ambil data produk dengan filter kategori (jika ada)
    $data['products'] = $this->productModel->getProductsWithCategory($categoryId);
    
    // Ambil semua kategori untuk dropdown filter
    $categoryModel = new \App\Models\CategoryModel();
    $data['categories'] = $categoryModel->findAll();
    
    return view('admin/products/index', $data);
    }

    public function create()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('admin/products/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name_product' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        // Upload file gambar
        $image = $this->request->getFile('image');
        $imageName = null;
    
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(FCPATH . 'uploads/products', $imageName);
        }
        $this->productModel->save([
            'name_product' => $this->request->getPost('name_product'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'category_id' => $this->request->getPost('category_id'),
            'image' => $imageName, // Simpan nama file gambar
        ]);
        session()->setFlashdata('pesan', 'Produk Berhasil Ditambahkan');
        return redirect()->to('/admin/products');
    }

    public function edit($id)
    {
        $data['product'] = $this->productModel->find($id);
        $data['categories'] = $this->categoryModel->findAll();
        return view('admin/products/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

    // Validasi input
    $validation->setRules([
        'name_product' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'image' => 'if_exist|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Ambil data produk lama
    $product = $this->productModel->find($id);

    if (!$product) {
        return redirect()->to('/admin/products')->with('error', 'Produk tidak ditemukan');
    }

    // Upload file gambar baru jika ada
    $image = $this->request->getFile('image');
    $imageName = $product['image']; // Tetap gunakan gambar lama jika tidak ada yang baru

    if ($image && $image->isValid() && !$image->hasMoved()) {
        // Hapus gambar lama jika ada
        $oldImagePath = FCPATH . 'uploads/products/' . $product['image'];
        if (is_file($oldImagePath)) {
            unlink($oldImagePath); // Hapus gambar lama
        }

        // Simpan gambar baru
        $imageName = $image->getRandomName();
        $image->move(FCPATH . 'uploads/products', $imageName);
    }
        $this->productModel->update($id, [
            'name_product' => $this->request->getPost('name_product'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'category_id' => $this->request->getPost('category_id'),
            'image' => $imageName,
        ]);
        session()->setFlashdata('pesan', 'Produk Berhasil Diupdate');
        return redirect()->to('/admin/products');
    }

    public function delete($id)
    {
        $this->productModel->delete($id);
        session()->setFlashdata('pesan', 'Produk Berhasil Dihapus');
        return redirect()->to('/admin/products');
    }
}
