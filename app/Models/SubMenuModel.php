<?php

namespace App\Models;

use CodeIgniter\Model;

class SubMenuModel extends Model

{
    protected $table = 'user_sub_menu';
    protected $useTimestamps = true;
    protected $allowedFields = ['menu_id', 'title_menu', 'url', 'icon', 'is_active'];

    public function getSubMenu()
    {

        $db      = \Config\Database::connect();
        $query = $db->query('SELECT `user_sub_menu`.*, `user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                ');
        return $query->getResultArray();


        // $db      = \Config\Database::connect();
        // $builder = $db->table('user_sub_menu');
        // $builder->select('user_sub_menu.* as menu', 'user_menu.menu');
        // // $builder->from('user_sub_menu');
        // $builder->join('user_sub_menu', 'user_sub_menu.menu_id = user_menu.id');
        // $query = $builder->get();

        // return $this->$query->getResultArray();
    }

    // supaya lebih rapi kita gabungkan kedalam method sndiri di dalam models
    // getProjects ini bisa jalanin 2 jika ada parameter cari menggunakan where, jika tidak ada ambil semua data projects 

}
