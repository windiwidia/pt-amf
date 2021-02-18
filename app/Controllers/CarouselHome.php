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

        return view('carousel-home/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Carousel Home',
            'validation' => \Config\Services::validation(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];

        return view('carousel-home/create_ch', $data);
    }

    public function save()
    {
        // validasi data input 
        if (!$this->validate([
            'image' => [
                'rules' => 'max_size[image, 2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ]

        ])) {
            return redirect()->to('/CarouselHome/create')->withInput();
        }

        // ambil gambar
        $fileImage = $this->request->getFile('image');

        // gambar default, apakah tidak ada gambar yang di upload, 4 artinya tidak ada file yg di upload
        if ($fileImage->getError() == 4) {
            $namaImage = 'default.jpg';
        } else {

            //generate nama image random
            $namaImage = $fileImage->getRandomName();
            // dd('fileImage');
            //pindahkan file ke folder img
            $fileImage->move('img/carousel-home', $namaImage);
        }
        // ambil nama file dengan nama yang sama saat upload
        // $namaImage = $fileImage->getName();

        // cara ngambil data yang dikirim, getvar mengambil request apapun get atau post
        // dd($this->request->getVar());
        // insert ke dalam database
        // string ramah url = url_title untuk menjadi hrufnya kecil semua dan spasinya hilang 
        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->carouselhomeModel->save([
            'image' => $namaImage,
            'slug' => $slug,
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description')
        ]);
        // sebelum redirect kita bikin dlu flash datanya
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        // kalo sudah ngesave kita kembalikan ke halaman daftar projects
        return redirect()->to('/CarouselHome');
    }
}
