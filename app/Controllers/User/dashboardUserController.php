<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class dashboardUserController extends Controller
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    


}
