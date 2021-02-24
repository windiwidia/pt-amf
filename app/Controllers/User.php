<?php

namespace App\Controllers;

// tambah namaspace
// use CodeIgniter\Controller;
use App\Models\AuthModel;
use App\Models\ActivationModel;

class User extends BaseController
{
    public function __construct()
    {
        // parent::__construct();
        // $this->projectsModel = new ProjectsModel();
        $this->authModel = new AuthModel();
        $this->load = \Config\Services::validation();
    }

    public function index()
    {

        // is_logged_in();
        if (!session()->get('email')) {
            return redirect()->to('/auth/login');
        }
        $data = [
            'title' => 'My Profile',
            'user' => $this->authModel->getAuth(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];
        // dd($data);
        // echo 'Selamat Datang ' . $data['user']['firstname'];
        return view('user/index', $data);
        // }
    }
}
