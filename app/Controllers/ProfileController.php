<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class ProfileController extends BaseController
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    public function index()
{
    $userId = session()->get('user_id');
    // $userName1 = session()->get('name_user');
    $profileModel = new \App\Models\ProfileModel();

    $userModel = new \App\Models\UserModel();
    $user = $userModel->where('id', $userId)->first();
    // $userName = $userModel->where('id', $userName1)->first();
    $profile = $profileModel->where('user_id', $userId)->first();
    $data =[
        'profile' => $profile,
        'user' => $user,
        // 'userName' => $userName,
    ];

    return view('profile/index', $data);

}

    public function update()
    {
        $userId = session()->get('user_id');
        $data = [
            'user_id' => $userId,
            'phone_number' => $this->request->getPost('phone_number'),
            'user_name' => $this->request->getPost('user_name'),
            'addres' => $this->request->getPost('addres'),
            'email' => $this->request->getPost('email')
        ];

        // Upload foto profil jika ada
        $file = $this->request->getFile('profile_picture');
        if ($file && $file->isValid()) {
            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);
            $data['profile_picture'] = $fileName;
        }

        // Cek apakah profil sudah ada
        $existingProfile = $this->profileModel->where('user_id', $userId)->first();
        if ($existingProfile) {
            // Update profil
            $this->profileModel->update($existingProfile['id'], $data);
        } else {
            // Tambahkan profil baru
            $this->profileModel->insert($data);
        }
        session()->setFlashdata('pesan', 'Profile Berhasil diperbarui');
        return redirect()->to('user/dashboard');
    }
}
