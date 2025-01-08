<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends Controller
{
    
    public function register()
    {
        $data = [
            'title' => 'Register-page',
        ];
        return view('auth/register', $data);
    }

    public function registerProcess()
    {
        $userModel = new UserModel();
        $data = [
            'name_user' => $this->request->getPost('name_user'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'user', // Default role
        ];
        $userModel->save($data);
        session()->setFlashdata('pesan','Akun berhasil dibuat');
        return redirect()->to('/login');
    }

    public function login()
    {
        $data = [
            'title' => 'Login-page',
        ];
        return view('auth/login', $data);
    }

    public function loginProcess()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id'       => $user['id'],
                'name_user' => $user['name_user'],
                'role'     => $user['role'],
                'isLoggedIn' => true
            ]);
            session()->set('user_id', $user['id']);

            session()->setFlashdata('pesan','Login berhasil');
            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Email atau Password salah!');
    }

    public function logout()
    {
        session()->destroy();
    return redirect()->to('/login')->with('message', 'Anda telah logout.');
    }
}
