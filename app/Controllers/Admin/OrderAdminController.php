<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\OrderModel;

class OrderAdminController extends Controller
{

    protected $orderModel;

    public function __construct()
    {
        $this->orderModel= new OrderModel();
    }
    public function index(){
    
    $data['orders'] = $this->orderModel->findAll();
    return view ('admin/orders/index', $data);

}



}
