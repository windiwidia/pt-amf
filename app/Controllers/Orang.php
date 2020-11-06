<?php

namespace App\Controllers;

// tambah namaspace
use App\Models\AuthModel;
use App\Models\OrangModel;

class Orang extends BaseController
{
    protected $orangModel;
    protected $AuthModel;
    // jika mempunyai method lain, pindah instansiasi class Model ke construct, agar semua method bisa pake
    public function __construct()
    {
        $this->orangModel = new orangModel();
        $this->authModel = new AuthModel();
    }
    public function index()
    {
        if (!session()->get('email')) {
            return redirect()->to('/auth/login');
        }
        // instansiasi class Model untuk database
        // $projectsModel = new \App\Models\ProjectsModel();
        // $projectsModel = new ProjectsModel();
        // $projects =  $this->projectsModel->findAll();

        //penghitungan halaman
        // cari tahu sedang di halaman berapa
        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;
        // d($this->request->getVar('keyword')); // menangkap data

        // cari data berdasarkankeyword
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $orang = $this->orangModel->search($keyword);
        } else {
            $orang = $this->orangModel;
        }

        $data = [
            'data' => $this->authModel->where(['email' => session()->get('email')])->first(),
            'title' => 'Daftar Orang',
            // data dikirim ke return view
            // tidak perlu parameter karena mau find all
            // 'orang' => $this->orangModel->findAll()
            'orang' => $orang->paginate(5, 'orang'),
            'pager' => $this->orangModel->pager,
            'currentPage' => $currentPage
        ];

        return view('orang/index', $data);
    }
}
