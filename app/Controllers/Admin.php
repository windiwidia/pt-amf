<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\ProjectsModel;

class Admin extends BaseController
{
	// protected $projectsModel;
	protected $AuthModel;

	// jika mempunyai method lain, pindah instansiasi class Model ke construct, agar semua method bisa pake
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
			'title' => 'Dashboard',
			'user' => $this->authModel->getAuth(),
			'data' => $this->authModel->where(['email' => session()->get('email')])->first()
		];
		// dd($data);
		// echo 'Selamat Datang ' . $data['user']['firstname'];
		return view('admin/index', $data);
		// }
	}

	public function myprofile($slug)
	{
		$data = [
			'title' => 'My Profile',
			'user' => $this->authModel->getAuth($slug),
			// 'var' => $this->authModel->getAuth($email),
			'data' => $this->authModel->where(['email' => session()->get('email')])->first()
		];
		// // jika projects tidak ada di tabel
		if (empty($data['user'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Tulisan ' . $slug . ' tidak ditemukan');
		}
		return view('admin/myprofile', $data);
	}

	public function editProfile($slug)
	{
		$data = [
			'title' => 'Edit Profile',
			'validation' => \Config\Services::validation(),
			'user' => $this->authModel->getAuth($slug),
			'data' => $this->authModel->where(['email' => session()->get('email')])->first()
		];
		return view('admin/editProfile', $data);
	}

	public function edit($id)
	{
		// cek judul 
		$profileLama =  $this->authModel->getAuth($this->request->getVar('slug'));
		if ($profileLama['firstname'] == $this->request->getVar('firstname')) {
			$rule_name = 'required';
		} else {
			$rule_name = 'required';
		}
		if (!$this->validate([
			'firstname' => [
				'rules' => $rule_name,
				'errors' => [
					'required' => 'Nama {field} harus diisi.'
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
			return redirect()->to('/admin/editProfile/' . $this->request->getVar('slug'))->withInput();
		}

		$fileImage = $this->request->getFile('image');

		// cek gambar apakah gambarnya berubah atau pake gambar yang lama
		if ($fileImage->getError() == 4) {
			$namaImage = $this->request->getVar('imageLama');
		} else {
			// generate nama file random
			$namaImage = $fileImage->getRandomName();
			// pindahkan gambar / upload gambar
			$fileImage->move('img/profile/', $namaImage);
			if ($this->request->getVar('imageLama') != 'default_profile.jpg') {
				// hapus file lama
				unlink('img/profile/' . $this->request->getVar('imageLama'));
			}
		}

		// $slug = url_title($this->request->getVar('klien'), '-', true);
		// dd($this->request->getVar());
		$slug = $this->request->getVar('firstname');
		$slug .= url_title($this->request->getVar('lastname'), '-', true);
		$this->authModel->save([
			'id' => $id,
			'firstname' => $this->request->getVar('firstname'),
			'lastname' => $this->request->getVar('lastname'),
			'slug' => $slug,
			'email' => $this->request->getVar('email'),
			'image' => $namaImage

		]);
		// sebelum redirect kita bikin dlu flash datanya
		session()->setFlashdata('pesan', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Data berhasil diubah !</div>');
		// kalo sudah ngesave kita kembalikan ke halaman daftar projects
		return redirect()->to('/admin');
	}

	public function change_password()
	{
		$data = [
			'title' => 'Change Password',
			'validation' => \Config\Services::validation(),
			'user' => $this->authModel->getAuth(),
			'data' => $this->authModel->where(['email' => session()->get('email')])->first()
		];
		return view('admin/change_password', $data);
	}

	public function change_pass()
	{
		// $data = [
		// 	// 'title' => 'Change Password',
		// 	// 'validation' => \Config\Services::validation(),
		// 	'user' => $this->authModel->getAuth(),
		// 	'data' => $this->authModel->where(['email' => session()->get('email')])->first()
		// ];
		if (!$this->validate([
			'current_password' => [
				'rules'  => 'required|trim',
				'errors' => [
					'required' => 'Password is required.',
					'min_length' => 'Your {field} is too short. Minimal 8 characters.'
				]
			],
			'new_password1' => [
				'rules'  => 'required|trim|min_length[8]|matches[new_password2]',
				'errors' => [
					'required' => 'New password is required.',
					'min_length' => 'Your {field} is too short. Minimal 8 characters.',
					'matches' => 'Please make sure your passwords match.'
				]
			],
			'new_password2' => [
				'rules'  => 'required|trim|min_length[8]|matches[new_password1]',
				'errors' => [
					'required' => 'Password confirmation is required.',
					'min_length' => 'Your {field} is too short. Minimal 8 characters.',
					'matches' => 'Please make sure your passwords match.'
				]
			]

		])) {
			return redirect()->to('/admin/change_password')->withInput();
		}
		// $email = $this->request->getPost('email');
		// $password = $this->request->getPost('password');


		$data = $this->authModel->where(['email' => session()->get('email')])->first();
		$current_password = $this->request->getPost('current_password');
		$new_password = $this->request->getPost('new_password1');
		if (!password_verify($current_password, $data['password'])) {
			session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Wrong current password.</div>');
			return redirect()->to('/admin/change_password');
		} else {
			if ($current_password == $new_password) {
				session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password</div>');
				return redirect()->to('/admin/change_password');
			} else {
				// password sudah ok
				$email = session()->get('email');
				$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
				$this->authModel->set('password', $password_hash);
				$this->authModel->where('email', $email);
				$this->authModel->update();

				session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Password has been change.</div>');
				return redirect()->to('/admin/change_password');
			}
		}
	}
}
