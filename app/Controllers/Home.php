<?php

namespace App\Controllers;

// tambah namaspace
// use CodeIgniter\Controller;
use App\Models\ProjectsModel;
use App\Models\AuthModel;

class Home extends BaseController
{
    protected $projectsModel;
    protected $authModel;
    // jika mempunyai method lain, pindah instansiasi class Model ke construct, agar semua method bisa pake
    public function __construct()
    {
        $this->projectsModel = new ProjectsModel();
        $this->authModel = new AuthModel();
        helper('text');
    }
    public function index()
    {

        if (!session()->get('email')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'PT Agiez Mitra Faathir',
            'validation' => \Config\Services::validation(),
            // data dikirim ke return view
            // tidak perlu parameter karena mau find all
            'projects' => $this->projectsModel->getProjects(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];

        return view('pages/index', $data);
    }

    public function sendMessage()
    {
        if (!$this->validate([
            'fullname' => [
                'rules' => 'required|trim',
                'errors' => [
                    'reqired' => 'Full name is required'
                ]
            ],
            'email' => [
                'rules' => 'required|trim|valid_email',
                'errors' => [
                    'reqiuired' => 'Email is required',
                    'valid_email' => 'Please check the email. It does not appear to be valid.'

                ]
            ],
            'subject' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Subject is required'
                ]
            ],
            'message' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Message is required'
                ]
            ]

        ])) {
            return redirect()->to('/home')->withInput();
        }

        $email = \Config\Services::email();
        $email->setFrom('windiwidiastuti0696@gmail.com');
        $email->setTo('windiwindi25@gmail.com');
        $email->setSubject($this->request->getVar('subject'));
        $email->setMessage($this->request->getVar('message'));

        // dd($email);

        if ($email->send()) {
            return true;
            // session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Thank you, your mail has been sent successfully!</div>');
            // // kalo sudah ngesave kita kembalikan ke halaman daftar projects
            // return redirect()->to('/home');
        } else {
            session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">There is error in sending mail! Please try again later</div>');
            // kalo sudah ngesave kita kembalikan ke halaman daftar projects
            return redirect()->to('/home');
        }
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Projects',
            'validation' => \Config\Services::validation(),
            'projects' => $this->projectsModel->getProjects($slug),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];
        // jika projects tidak ada di tabel
        if (empty($data['projects'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tulisan ' . $slug . ' tidak ditemukan');
        }
        return view('/pages/projects', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About',
            'validation' => \Config\Services::validation(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];
        return view('/pages/about', $data);
    }

    public function services()
    {
        $data = [
            'title' => 'Our Services',
            'validation' => \Config\Services::validation(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];
        return view('/pages/about', $data);
    }

    public function projectlist()
    {
        $data = [
            'title' => 'Project List',
            'validation' => \Config\Services::validation(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];
        return view('/pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact',
            'validation' => \Config\Services::validation(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first()
        ];
        return view('/pages/about', $data);
    }


    // $email->initialize($config);



    // public function googlemaps(){
    //     $this->load->library('googlemaps');

    //     $config = [
    //         'center' => '',
    //         'zoom' => 'auto'
    //     ];

    //     $this->googlemaps->initialize($config);

    //     $marker = ['position' => ''];
    //     $this->googlemaps()->mar
    // }


}
