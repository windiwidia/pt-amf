<?php

namespace App\Controllers;

// tambah namaspace
// use CodeIgniter\Controller;
use App\Models\CarouselHomeModel;
use App\Models\AuthModel;

class Projects extends BaseController
{
    protected $carouselhomeModel;
    protected $AuthModel;
    // jika mempunyai method lain, pindah instansiasi class Model ke construct, agar semua method bisa pake
    public function __construct()
    {
        $this->carouselhomeModel = new CarouselHomeModel();
        $this->authModel = new AuthModel();
        helper('text');
    }

    public function index()
    {
        helper('text');
        $data = [
            'title' => 'Carousel Home',
            // data dikirim ke return view
            // tidak perlu parameter karena mau find all
            'projects' => $this->carouselhomeModel->getCarouselHome(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];

        return view('/carousel-home/index', $data);
    }
}
