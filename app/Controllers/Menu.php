<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\ProjectsModel;
use App\Models\UserMenuModel;
use App\Models\SubMenuModel;

class Menu extends BaseController
{
    // protected $projectsModel;
    protected $AuthModel;

    // jika mempunyai method lain, pindah instansiasi class Model ke construct, agar semua method bisa pake
    public function __construct()
    {
        // parent::__construct();

        // $this->projectsModel = new ProjectsModel();
        $this->userMenuModel = new UserMenuModel();
        $this->subMenuModel = new SubMenuModel();
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
            'title' => 'Menu Management',
            'user' => $this->authModel->getAuth(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first(),
            'validation' => \Config\Services::validation(),
            'menu' => $this->userMenuModel->findAll()
            // 'menu' => $db->getDatabase('user_menu')->getResultArray()
        ];

        return view('menu/index', $data);
    }

    public function addmenu()
    {
        if (!$this->validate([
            'menu' =>  [
                'label' => 'Menu',
                'rules'  => 'required',
                'error' => ['required' => 'Menu is required.']
            ]

        ])) {
            return redirect()->to('/menu')->withInput();
        } else {
            $this->userMenuModel->save([
                'menu' => $this->request->getVar('menu')
            ]);
            session()->setFlashdata('message', '<div class="alert alert-success" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>New menu added!</div>');
            return redirect()->to('/menu')->withInput();
        }
    }
    public function submenu()
    {
        $data = [
            'title' => 'Submenu Management',
            'user' => $this->authModel->getAuth(),
            'data' => $this->authModel->where(['email' => session()->get('email')])->first(),
            'validation' => \Config\Services::validation(),
            'menu' => $this->userMenuModel->findAll(),
            'subMenu' => $this->subMenuModel->getSubMenu()
            // 'menu' => $db->getDatabase('user_menu')->getResultArray()
        ];

        return view('menu/submenu', $data);
    }

    public function submenuAdd()
    {
        if (!$this->validate([
            'title_menu' =>  [
                'label' => 'Title',
                'rules'  => 'required',
                'error' => ['required' => '{field} is required.']
            ],
            'menu_id' =>  [
                'label' => 'Menu',
                'rules'  => 'required',
                'error' => ['required' => '{field} is required.']
            ],
            'url' =>  [
                'label' => 'Url',
                'rules'  => 'required',
                'error' => ['required' => '{field} is required.']
            ],
            'icon' =>  [
                'label' => 'Icon',
                'rules'  => 'required',
                'error' => ['required' => '{field} is required.']
            ]

        ])) {
            // session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">The field is required!</div>');
            return redirect()->to('/menu/submenu')->withInput();
            // return view('menu/submenu/#NewSubMenuModal');
        } else {
            $this->subMenuModel->save([
                'title_menu' => $this->request->getVar('title_menu'),
                'menu_id' => $this->request->getVar('menu_id'),
                'url' => $this->request->getVar('url'),
                'icon' => $this->request->getVar('icon'),
                'is_active' => $this->request->getVar('is_active')

            ]);
            session()->setFlashdata('message', '<div class="alert alert-success" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>New submenu added!</div>');
            return redirect()->to('/menu/submenu')->withInput();
        }
    }

    public function deletemenu($id = null)
    {

        $data['menu'] = $this->userMenuModel->where('id', $id)->delete();
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data has been deleted!</div>');
        return redirect()->to('/menu');
    }

    public function deletesubmenu($id = null)
    {

        $data['menu'] = $this->subMenuModel->where('id', $id)->delete();
        session()->setFlashdata('message', '<div class="alert alert-success" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data has been deleted!</div>');
        return redirect()->to('/menu/submenu');
    }

    // public function editmenu()
    // {
    //     $data = [
    //         'title' => 'Menu Management',
    //         'user' => $this->authModel->getAuth(),
    //         'data' => $this->authModel->where(['email' => session()->get('email')])->first(),
    //         'validation' => \Config\Services::validation(),
    //         'menu' => $this->userMenuModel->findAll()
    //     ];

    //     return view('/menu', $data);
    // }

    // public function updatemenu($id)
    // {
    //     $menuLama =  $this->userMenuModel->getProjects($this->request->getVar('slug'));
    //     if ($projectsLama['klien'] == $this->request->getVar('klien')) {
    //         $rule_klien = 'required';
    //     } else {
    //         $rule_klien = 'required|is_unique[projects.klien]';
    //     }


    //     if (!$this->validate([
    //         'klien' => [
    //             'rules' => $rule_klien,
    //             'errors' => [
    //                 'required' => 'Nama {field} harus diisi.',
    //                 'is_unique' => 'Nama {field} sudah terdaftar'
    //             ]
    //         ]

    //     ])) {

    //         return redirect()->to('/projects/edit/' . $this->request->getVar('slug'))->withInput();
    //     }
    // }
}
