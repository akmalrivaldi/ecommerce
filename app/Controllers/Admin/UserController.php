<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->UserModel->findAll();
        return view('admin/users/index', $data);
    }
    // public function create()
    // {
    //     $data['users'] = $this->UserModel->findAll();
    //     return view('admin/users/create', $data);
    // }
    public function delete($id)
    {
        $this->UserModel->delete($id);
        session()->setFlashdata('pesan', 'user Berhasil Dihapus');
        return redirect()->to('/admin/users');
    }
}