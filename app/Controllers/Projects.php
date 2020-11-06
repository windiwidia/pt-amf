<?php

namespace App\Controllers;

// tambah namaspace
// use CodeIgniter\Controller;
use App\Models\ProjectsModel;
use App\Models\AuthModel;

class Projects extends BaseController
{
    protected $projectsModel;
    protected $AuthModel;
    // jika mempunyai method lain, pindah instansiasi class Model ke construct, agar semua method bisa pake
    public function __construct()
    {
        $this->projectsModel = new ProjectsModel();
        $this->authModel = new AuthModel();
        helper('text');
    }
    public function index()
    {
        // instansiasi class Model untuk database
        // $projectsModel = new \App\Models\ProjectsModel();
        // $projectsModel = new ProjectsModel();
        // $projects =  $this->projectsModel->findAll();
        helper('text');
        $data = [
            'title' => 'Daftar Projects',
            // data dikirim ke return view
            // tidak perlu parameter karena mau find all
            'projects' => $this->projectsModel->getProjects(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];

        return view('/projects/index', $data);
    }

    //  method detail akan menerima parameter slug
    public function detail($slug)
    {
        // pada saat mengeklik detail,cariprojects yang slugnya apa
        // ambil this projects model panggil method where nya slug adalah slug ambil data pertama 
        // $projects = $this->projectsModel->where(['slug' => $slug])->first();
        // dd($projects);
        // $projects = $this->projectsModel->getProjects($slug);
        // dd($projects);
        $data = [
            'title' => 'Detail Projects',
            'projects' => $this->projectsModel->getProjects($slug),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];

        // jika projects tidak ada di tabel
        if (empty($data['projects'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tulisan ' . $slug . ' tidak ditemukan');
        }
        return view('projects/detail', $data);
    }

    public function create()
    {

        // session();
        $data = [
            'title' => 'Form Tambah Data Projects',
            'validation' => \Config\Services::validation(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];

        return view('projects/create', $data);
    }

    // method ini berfungsi untuk mengelola data yang dikirim oleh create untuk diinsert kedalam tabel
    public function save()
    {
        // validasi data input 
        if (!$this->validate([
            'klien' => [
                'rules' => 'required|is_unique[projects.klien]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} klien sudah terdaftar.'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image, 1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // cara mengambil pesan kesalalahan
            // $validation = \Config\Services::validation();
            // dd($validation);
            // mengirimkan semua input yang udah diketikkan menggunakan withinput
            // mengirimkan data validation
            // return redirect()->to('/projects/create')->withInput()->with('validation', $validation);
            return redirect()->to('/projects/create')->withInput();
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
            $fileImage->move('img/projects', $namaImage);
        }
        // ambil nama file dengan nama yang sama saat upload
        // $namaImage = $fileImage->getName();

        // cara ngambil data yang dikirim, getvar mengambil request apapun get atau post
        // dd($this->request->getVar());
        // insert ke dalam database
        // string ramah url = url_title untuk menjadi hrufnya kecil semua dan spasinya hilang 
        $slug = url_title($this->request->getVar('klien'), '-', true);
        $this->projectsModel->save([
            'klien' => $this->request->getVar('klien'),
            'slug' => $slug,
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tahun' => $this->request->getVar('tahun'),
            'image' => $namaImage,
            'alamat' => $this->request->getVar('alamat')
        ]);
        // sebelum redirect kita bikin dlu flash datanya
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        // kalo sudah ngesave kita kembalikan ke halaman daftar projects
        return redirect()->to('/projects');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $projects = $this->projectsModel->find($id);

        // cek jikafile gambarnya default.jpg
        if ($projects['image'] != 'default.jpg') {

            //hapus gambar
            unlink('img/projects/' . $projects['image']);
        }

        $this->projectsModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/projects');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Projects',
            'validation' => \Config\Services::validation(),
            'projects' => $this->projectsModel->getProjects($slug),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];

        return view('/projects/edit', $data);
    }

    public function update($id)
    {
        // cek judul 
        $projectsLama =  $this->projectsModel->getProjects($this->request->getVar('slug'));
        if ($projectsLama['klien'] == $this->request->getVar('klien')) {
            $rule_klien = 'required';
        } else {
            $rule_klien = 'required|is_unique[projects.klien]';
        }


        if (!$this->validate([
            'klien' => [
                'rules' => $rule_klien,
                'errors' => [
                    'required' => 'Nama {field} harus diisi.',
                    'is_unique' => 'Nama {field} sudah terdaftar'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image, 1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // cara mengambil pesan kesalalahan
            // $validation = \Config\Services::validation();
            // dd($validation);
            // mengirimkan semua input yang udah diketikkan menggunakan withinput
            // mengirimkan data validation
            // $this ... supaya kembali ke edit dan sudah ada isinya
            return redirect()->to('/projects/edit/' . $this->request->getVar('slug'))->withInput();
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
            $fileImage->move('img/projects/', $namaImage);

            if ($this->request->getVar('imageLama') != 'default.jpg') {

                // hapus file lama
                unlink('img/projects/' . $this->request->getVar('imageLama'));
            }
        }

        // dd($this->request->getVar());
        $slug = url_title($this->request->getVar('klien'), '-', true);
        $this->projectsModel->save([
            'id' => $id,
            'klien' => $this->request->getVar('klien'),
            'slug' => $slug,
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tahun' => $this->request->getVar('tahun'),
            'image' => $namaImage,
            'alamat' => $this->request->getVar('alamat')
        ]);
        // sebelum redirect kita bikin dlu flash datanya
        session()->setFlashdata('pesan', 'Data berhasil diubah.');


        // kalo sudah ngesave kita kembalikan ke halaman daftar projects
        return redirect()->to('/projects');
    }
}
