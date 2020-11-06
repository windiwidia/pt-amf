<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectsModel extends Model
{
    protected $table = 'projects';
    protected $useTimestamps = true;
    protected $allowedFields = ['klien', 'slug', 'pekerjaan', 'deskripsi', 'tahun', 'image', 'alamat'];

    // supaya lebih rapi kita gabungkan kedalam method sndiri di dalam models
    // getProjects ini bisa jalanin 2 jika ada parameter cari menggunakan where, jika tidak ada ambil semua data projects 
    public function getProjects($slug = false)
    {
        // jika slugnya false maka ditampilkkan this projectsModel lalu find all
        if ($slug == false) {
            return $this->findAll();
        }
        // jikada return 
        return $this->where(['slug' => $slug])->first();
    }
}
