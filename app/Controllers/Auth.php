<?php

namespace App\Controllers;

// tambah namaspace
// use CodeIgniter\Controller;
use App\Models\AuthModel;
use App\Models\ActivationModel;

class Auth extends BaseController
{
    protected $AuthModel;
    // jika mempunyai method lain, pindah instansiasi class Model ke construct, agar semua method bisa pake
    public function __construct()
    {
        // parent::__construct();
        $this->authModel = new AuthModel();
        $this->activationModel = new ActivationModel();
        // $this->load = \Config\Services::validation();
    }
    public function index()
    {
        // instansiasi class Model untuk database
        // $projectsModel = new \App\Models\ProjectsModel();
        // $projectsModel = new ProjectsModel();
        // $projects =  $this->projectsModel->findAll();


        $data = [
            'title' => 'Sign in',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function login()
    {

        if (!$this->validate([
            'email' =>  [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.'
                ]
            ],
            'password' =>  [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Password is required.'

                ]
            ]

        ])) {
            // $data = [
            //     'title' => 'Login',
            //     'validation' => \Config\Services::validation()
            // ];
            // return view('/auth/login', $data);
            //  ternyata kmu harus redirect dlu withinput biar error dan value nya kebaca, trus validation di taro diatas return view
            return redirect()->to('/auth/login')->withInput();
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $this->authModel->where(['email' => $email])->first();
            // dd($user);

            // jika usernya ada
            if ($user) {
                // jika usernya aktif
                if ($user['is_active'] == 1) {
                    // cek password
                    if (password_verify($password, $user['password'])) {
                        // jika benar ada 2 hal, siapin data di dlm session, untuk digunakan dlm user
                        $data = [
                            'firstname' => $user['firstname'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        //simpan ke dalam session
                        // $session = session();
                        // $session = \Config\Services::session();
                        session()->set($data);
                        // dd($data);
                        session()->setFlashdata('pesan-login', '<div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Login Successfull !
                    </div>');
                        return redirect()->to('/admin');
                    } else {
                        session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                        return redirect()->to('/auth/login')->withInput();
                    }
                } else {
                    session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                    return redirect()->to('/auth/login')->withInput();
                }
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
                return redirect()->to('/auth/login')->withInput();
            }
        }
    }

    public function registration()
    {


        $data = [
            'title' => 'Sign up',
            'validation' => \Config\Services::validation()

        ];

        return view('auth/registration', $data);
    }
    public function save()
    {
        // validasi data input 
        if (!$this->validate([
            'firstname' => [
                // 'label'  => 'Username',
                'rules'  => 'required|trim',
                'errors' => [
                    'required' => 'Firstname is required.',

                ]
            ],
            'email' => [
                // 'label'  => 'Email',
                'rules'  => 'required|trim|is_unique[user.email]|valid_email',
                'errors' => [
                    'required' => 'Email is required.',
                    'is_unique' => 'Email has already registered.',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.'
                ]
            ],
            'password1' => [
                'rules'  => 'required|trim|min_length[8]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Your {field} is too short. Minimal 8 characters.'
                ]
            ],
            'password2' => [
                'rules'  => 'required|trim|min_length[8]|matches[password1]',
                'errors' => [
                    'required' => 'Password confirmation is required.',
                    'min_length' => 'Your {field} is too short. Minimal 8 characters.',
                    'matches' => 'Please make sure your passwords match.'
                ]
            ]
        ])) {
            // echo 'data berhasil ditambahkan!';
            // return redirect()->to('/auth');
            return redirect()->to('/auth/registration')->withInput();
        } else {
            $slug = $this->request->getVar('firstname');
            $slug .= url_title($this->request->getVar('lastname'), '-', true);
            $email = $this->request->getVar(('email'));
            // $password = $this->request->getVar('password1');
            $this->authModel->save([
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'slug' => $slug,
                'email' =>  $email,
                'image' => 'default_profile.jpg',
                'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 0
            ]);

            // siapkan token 
            // terjemahkan supaya bisa di kenali mysql
            $token = base64_encode(random_bytes(32));
            // var_dump($token);
            // die;
            $this->activationModel->save([
                'email' =>  $email,
                'token' => $token,
                'created_at' => time()

            ]);

            $this->_sendEmail($token, 'verify');
            // // sebelum redirect kita bikin dlu flash datanya
            session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please check your email to activate your account.</div>');
            // kalo sudah ngesave kita kembalikan ke halaman daftar projects
            return redirect()->to('/auth/login');
        }
    }

    private function _sendEmail($token, $type)
    {

        $email = \Config\Services::email();

        $email->setFrom('windiwidiastuti0696@gmail.com', 'Windi Widiastuti');
        $email->setTo($this->request->getVar('email'));

        $firstname =  $this->authModel->getAuth($this->request->getVar('firstname'));
        $firstname = $this->authModel->where(['firstname' => $firstname])->first();
        if ($type == 'verify') {

            $email->setSubject('Account Verification');
            $email->setMessage(
                '<h3>Hi ' .  $this->request->getVar('firstname') . '</h3>
                <p>You have successfully created AMF account.</p>
                <p>Please click on the link below to verify your email address and complete your registration.</p>
                <a href="' . base_url() . '/auth/verify?email=' .
                    $this->request->getVar('email') . '&token=' . urlencode($token) . '" class="btn btn-primary">Verify email address</a>
                    ',
            );
        } else if ($type == 'forgot') {
            $email->setSubject('Reset Password');
            $email->setMessage(
                '<h3>Hi ' .  $this->request->getVar('email') . '</h3>
                <p></p>
                <p>Please click on the link below to reset your password :</p>
                <a href="' . base_url() . '/auth/resetPassword?email=' .
                    $this->request->getVar('email') . '&token=' . urlencode($token) . '" class="btn btn-primary">Reset Password</a>
                    ',
            );
        }


        if ($email->send()) {
            return true;
        } else {
            echo $email->printDebugger();
            // die;
            echo "errorrrrrrrrrrrrr";
        }
    }

    public function verify()
    {
        // ambil email dr url
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        $user = $this->activationModel->where('email', ['email' => $email])->first();

        // cek
        if ($user) {
            $user_token = $this->activationModel->where('token', ['token' => $token])->first();

            if ($user_token) {
                if (time() - $user_token['created_at'] < (60 * 60 * 24)) {
                    //  update table user

                    $this->authModel->set('is_active', 1);
                    $this->authModel->where('email', $email);
                    $this->authModel->update();

                    $this->activationModel->where(['email' => $email])->delete();
                    // $this->activationModel->where('email', $email);

                    session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">' . $email . ' has been activated. Please login.</div>');
                    return redirect()->to('/auth/login');
                } else {

                    $this->authModel->where(['email' => $email])->delete();
                    $this->activationModel->where(['email' => $email])->delete();

                    session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    return redirect()->to('/auth/login');
                }
            } else {
                // jika emailnya ngasal
                session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Account activation failed! Token invalid.</div>');
                return redirect()->to('/auth/login');
            }
        } else {
            // jika emailnya ngasal
            session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            return redirect()->to('/auth/login');
        }
    }

    public function forgotPassword()
    {
        $data = [
            'title' => 'Forgot Password',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/forgotPassword', $data);
    }

    // cek email
    public function reset()
    {
        if (!$this->validate([
            'email' =>  [
                'rules'  => 'required|is_unique[user.email]|valid_email',
                'errors' => [
                    'required' => 'Email is required.',
                    // 'is_unique' => 'Email has already registered.',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.'
                ]
            ]

        ])) {
            return redirect()->to('/auth/forgotPassword')->withInput();
        } else {
            // cek email dalam database dan ambil satu baris
            $email = $this->request->getPost('email');
            $user = $this->authModel->where(['email' => $email, 'is_active' => 1])->first();
            // jika ada isinya, bikin token lagi
            if ($user) {
                // jika ada usernya bikin token
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'created_at' => time()
                ];

                $this->activationModel->insert($user_token);
                $this->_sendEmail($token, 'forgot');

                session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Please check your email to reset your password!.</div>');
                return redirect()->to('/auth/forgotPassword');
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Email is not registered or activated.</div>');
                return redirect()->to('/auth/forgotPassword');
            }
        }
    }

    // untuk ngecek link yang dikirim valid ato tidak
    public function resetPassword()
    {
        // ambil emai dan token di url
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        $user = $this->activationModel->where(['email' => $email])->first();
        // $user = $this->authModel->where(['email' => $email])->first();

        if ($user) {
            $user_token = $this->activationModel->where(['token' => $token])->first();
            // $user_token = $this->activationModel->where(['token' => $token])->first();
            if ($user_token) {

                // buat session, supaya data hanya server yang tahu

                session()->set('reset_email', $email);
                return redirect()->to('/auth/changePassword');
                // $this->changePassword();
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                return redirect()->to('/auth/login');
            }
        } else {
            session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            return redirect()->to('/auth/login');
        }
    }
    public function changePassword()
    {
        if (!session()->get('reset_email')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Change Password',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/changePassword', $data);
    }
    public function changePass()
    {

        if (!$this->validate([
            'password1' => [
                'rules'  => 'required|trim|min_length[8]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Your {field} is too short. Minimal 8 characters.'
                ]
            ],
            'password2' => [
                'rules'  => 'required|trim|min_length[8]|matches[password1]',
                'errors' => [
                    'required' => 'Password confirmation is required.',
                    'min_length' => 'Your {field} is too short. Minimal 8 characters.',
                    'matches' => 'Please make sure your passwords match.'
                ]
            ]

        ])) {
            return redirect()->to('/auth/changePassword')->withInput();
        } else {
            $password = password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT);
            $email = session()->get('reset_email');

            $this->authModel->set('password', $password);
            $this->authModel->where('email', $email);
            $this->authModel->update();
            session()->remove('reset_email');

            session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Password has been change. Please login.</div>');
            return redirect()->to('/auth/login');
        }
    }
    public function logout()
    {
        session()->remove('email');
        session()->remove('role_id');

        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">You have been logged out.</div>');

        return redirect()->to('/auth/login');
    }
}
