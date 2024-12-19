<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('admin/categories/index', $data);
    }

    public function create()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('admin/categories/create', $data);
    }

    public function store()
    {
        $this->categoryModel->save([
            'name_category' => $this->request->getPost('name_category'),
        ]);
        session()->setFlashdata('pesan', 'Kategori Berhasil Ditambahkan');
        return redirect()->to('/admin/categories');
    }

    public function edit($id)
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('admin/categories/edit', $data);
    }

    public function update($id)
    {
        $this->categoryModel->update($id, [
            'name_category' => $this->request->getPost('name_category'),

        ]);
        return redirect()->to('/admin/categories');
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);
        session()->setFlashdata('pesan', 'Kategori Berhasil Dihapus');
        return redirect()->to('/admin/categories');
    }
}
