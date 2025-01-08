<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;

class dashboard extends Controller
{

    protected $productModel;
    protected $categoryModel;
    protected $userModel;
    protected $orderModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
        $this->orderModel = new OrderModel();
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
            'totalOrders' => $this->orderModel->countOrders(), // Gantilah dengan query orders jika sudah tersedia
            'totalUsers' => $this->userModel->countUsers(),
        ];
        return view('admin/dashboardAdmin', $data);
    }

    public function user()
    {
        
        $search = $this->request->getGet('search');
        $category = $this->request->getGet('category');

        $query = $this->productModel->select('products.*, categories.name_category')
            ->join('categories', 'products.category_id = categories.id', 'left');

        if ($search) {
            $query->like('products.name_product', $search);
        }

        if ($category) {
            $query->where('products.category_id', $category);
        }

        $data['products'] = $query->findAll();
        $data['categories'] = $this->categoryModel->findAll();

        return view('user/dashboardUser', $data);
    }
}
