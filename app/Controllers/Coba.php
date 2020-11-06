<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        echo 'Ini controlller Coba method index';
    }

    public function about($nama = '', $umur = 0)
    {
        echo "Halo, nama saya $nama, saya berumur $umur tahun .";
    }
}
