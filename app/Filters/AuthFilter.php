<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Pastikan user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Ambil role dari session
        $role = session()->get('role');

        // Pastikan role ada dan valid
        if ($role === null) {
            return redirect()->to('/login')->with('error', 'Peran pengguna tidak ditemukan.');
        }

        // Role-based access (memeriksa apakah argumentnya adalah array dan memeriksa role)
        if (is_array($arguments) && !empty($arguments)) {
            if (in_array('admin', $arguments) && $role != 'admin') {
                return redirect()->to('/user/dashboard')->with('error', 'Akses ditolak.');
            }
        } else {
            // Jika arguments bukan array, hanya periksa role admin untuk akses admin
            if ($arguments === 'admin' && $role != 'admin') {
                return redirect()->to('/user/dashboard')->with('error', 'Akses ditolak.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}


