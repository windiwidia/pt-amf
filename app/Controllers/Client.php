<?php

namespace App\Controllers;

// tambah namaspace
// use CodeIgniter\Controller;
use App\Models\AuthModel;
use App\Models\ClientModel;

class Client extends BaseController
{
    protected $clientModel;
    protected $AuthModel;

    // jika mempunyai method lain, pindah instansiasi class Model ke construct, agar semua method bisa pake
    public function __construct()
    {
        $this->clientModel = new ClientModel();
        $this->authModel = new AuthModel();
    }
    public function index()
    {

        if (!session()->get('email')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'data' => $this->authModel->where(['email' => session()->get('email')])->first(),
            'title' => 'Daftar Client',
            // data dikirim ke return view
            // tidak perlu parameter karena mau find all
            'validation' => \Config\Services::validation(),
            'client' => $this->clientModel->getClient()
        ];

        return view('/client/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'data' => $this->authModel->where(['email' => session()->get('email')])->first(),
            'title' => 'Form Tambah Data Client',
            'validation' => \Config\Services::validation()
        ];

        return view('client/create', $data);
    }

    // method ini berfungsi untuk mengelola data yang dikirim oleh create untuk diinsert kedalam tabel
    public function save()
    {
        // validasi data input 
        if (!$this->validate([
            'klien' => [
                'rules' => 'required|is_unique[client.klien]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required|is_unique[client.pekerjaan]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'alamat' => [
                'rules' => 'required|is_unique[client.alamat]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ])) {

            return redirect()->to('/client/create')->withInput();
        }
        // insert ke dalam database
        // string ramah url = url_title untuk menjadi hrufnya kecil semua dan spasinya hilang 
        $slug = url_title($this->request->getVar('klien'), '-', true);
        $this->clientModel->save([
            'klien' => $this->request->getVar('klien'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'alamat' => $this->request->getVar('alamat'),
            'slug' => $slug
        ]);
        // sebelum redirect kita bikin dlu flash datanya
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        // kalo sudah ngesave kita kembalikan ke halaman daftar projects
        return redirect()->to('/client');
    }

    public function delete($id)
    {

        $this->clientModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/client');
    }

    public function edit($slug)
    {
        $data = [
            'data' => $this->authModel->where(['email' => session()->get('email')])->first(),
            'title' => 'Form Ubah Data Client',
            'validation' => \Config\Services::validation(),
            'client' => $this->clientModel->getClient($slug)
        ];

        return view('client/edit', $data);
    }

    public function update($id)
    {
        // cek judul 
        $clientLama =  $this->clientModel->getclient($this->request->getVar('slug'));
        if ($clientLama['klien'] == $this->request->getVar('klien')) {
            $rule_klien = 'required';
        } else {
            $rule_klien = 'required|is_unique[client.klien]';
        }


        if (!$this->validate([
            'klien' => [
                'rules' => $rule_klien,
                'errors' => [
                    'required' => 'Nama {field} harus diisi.'
                    // 'is_unique' => 'Nama {field} sudah terdaftar'
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                    // 'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                    // 'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ])) {
            // cara mengambil pesan kesalalahan
            // $validation = \Config\Services::validation();
            // dd($validation);
            // mengirimkan semua input yang udah diketikkan menggunakan withinput
            // mengirimkan data validation
            // $this ... supaya kembali ke edit dan sudah ada isinya
            return redirect()->to('/client/edit/' . $this->request->getVar('slug'))->withInput();
        }
        // dd($this->request->getVar());
        $slug = url_title($this->request->getVar('klien'), '-', true);
        $this->clientModel->save([
            'id' => $id,
            'klien' => $this->request->getVar('klien'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'alamat' => $this->request->getVar('alamat'),
            'slug' => $slug
        ]);
        // sebelum redirect kita bikin dlu flash datanya
        session()->setFlashdata('pesan', 'Data berhasil diubah.');


        // kalo sudah ngesave kita kembalikan ke halaman daftar projects
        return redirect()->to('/client');
    }
}
