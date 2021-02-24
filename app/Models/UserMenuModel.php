<?php

namespace App\Models;

use CodeIgniter\Model;

class UserMenuModel extends Model

{
    protected $table = 'user_menu';
    protected $useTimestamps = true;
    protected $allowedFields = ['menu'];

    // supaya lebih rapi kita gabungkan kedalam method sndiri di dalam models
    // getProjects ini bisa jalanin 2 jika ada parameter cari menggunakan where, jika tidak ada ambil semua data projects 

}
