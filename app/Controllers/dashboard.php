<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class dashboard extends Controller
{

    protected $productModel;
    protected $categoryModel;
    protected $userModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
    }
    public function index()
{
    $role = session()->get('role');
    if ($role == 'admin') {
        return redirect()->to('/admin/dashboard');
    }
    return redirect()->to('/user/dashboard');
}

    public function admin()
    {
        $data = [
            'title' => 'admin dashboard',
            'totalProducts' => $this->productModel->countProducts(),
            'totalCategories' => $this->categoryModel->countCategories(),
            'totalOrders' => 0, // Gantilah dengan query orders jika sudah tersedia
            'totalUsers' => $this->userModel->countUsers(),
        ];
        return view('admin/dashboardAdmin', $data);
    }

    public function user()
    {
        return view('user/dashboardUser', ['title' => 'User Dashboard']);
    }
}
