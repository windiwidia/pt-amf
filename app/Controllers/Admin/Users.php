<?php

// user hanya diakses oleh admin
// tambahkan namespace ke folder admin
namespace App\Controllers\Admin;

// agar basecontroller tidak error
use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        echo 'Ini controlller Users method index yang ada di dalam folder Admin';
    }
}
