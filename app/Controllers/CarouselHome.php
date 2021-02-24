<?php

namespace App\Controllers;

// tambah namaspace
// use CodeIgniter\Controller;
use App\Models\CarouselHomeModel;
use App\Models\AuthModel;

class Carouselhome extends BaseController
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
            'carouselhome' => $this->carouselhomeModel->getCarouselHome(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];

        return view('carouselhome/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Carousel Home',
            'validation' => \Config\Services::validation(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];

        return view('carouselhome/create', $data);
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
            return redirect()->to('/carouselhome/create')->withInput();
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
            $fileImage->move('img/carouselhome', $namaImage);
        }

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
        return redirect()->to('/carouselhome');
    }

    public function delete($id)
    {

        $this->carouselhomeModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/carouselhome');
    }

    public function edit($slug)
    {
        $data = [
            'data' => $this->authModel->where(['email' => session()->get('email')])->first(),
            'title' => 'Form Ubah Carousel Home',
            'carouselhome' => $this->carouselhomeModel->getCarouselHome($slug),
            'validation' => \Config\Services::validation(),
            // 'client' => $this->clientModel->getClient($slug)
        ];

        return view('carouselhome/edit', $data);
    }

    public function update($id)
    {
        // cek judul 
        $titleLama =  $this->carouselhomeModel->getCarouselHome($this->request->getVar('slug'));
        if ($titleLama['title'] == $this->request->getVar('title')) {
            $rule_title = 'required';
        } else {
            $rule_title = 'required';
        }


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
                'rules' => $rule_title,
                'errors' => [
                    'required' => '{field} harus diisi.'
                    // 'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                    // 'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ])) {

            return redirect()->to('/carouselhome/edit/' . $this->request->getVar('slug'))->withInput();
        }

        // ambil gambar 
        $fileImage = $this->request->getFile('image');

        // cek gambar apakah gambarnya berubah atau pake gambar yang lama/ apakah tidak ada gambar yang di upload
        if ($fileImage->getError() == 4) {
            // $namaImage = 'default'
            $namaImage = $this->request->getVar('imageLama');
        } else {
            // generate nama file random / ambil nama file
            $namaImage = $fileImage->getRandomName();

            // pindahkan gambar / upload gambar ke folder img
            $fileImage->move('img/carouselhome/', $namaImage);

            if ($this->request->getVar('imageLama') != 'default.jpg') {

                // hapus file lama
                unlink('img/carouselhome/' . $this->request->getVar('imageLama'));
            }
        }
        // dd($this->request->getVar());
        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->carouselhomeModel->save([
            'id' => $id,
            'image' => $this->request->getVar('image'),
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'description' => $this->request->getVar('description')
        ]);
        // sebelum redirect kita bikin dlu flash datanya
        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        // kalo sudah ngesave kita kembalikan ke halaman daftar projects
        return redirect()->to('/carouselhome');
    }
}
