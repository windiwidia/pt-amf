<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model

{
    protected $table = 'user';
    protected $useTimestamps = true;
    protected $allowedFields = ['firstname', 'lastname', 'slug', 'email', 'image', 'password', 'role_id', 'is_active'];

    // supaya lebih rapi kita gabungkan kedalam method sndiri di dalam models
    // getProjects ini bisa jalanin 2 jika ada parameter cari menggunakan where, jika tidak ada ambil semua data projects 
    public function getAuth($slug = false)
    {
        // jika slugnya false maka ditampilkkan this projectsModel lalu find all
        if ($slug == false) {
            return $this->findAll();
        }
        // jikada return 
        return $this->where(['slug' => $slug])->first();
        // aku habis ganti email dengan username
    }
}
