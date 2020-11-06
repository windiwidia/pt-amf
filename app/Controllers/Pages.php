<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        // $faker = \Faker\Factory::create();
        // dd($faker->name);

        //membuat title tab setiap navbar milik masing masing
        if (!session()->get('email')) {
            return redirect()->to('/auth/login');
        }
        $data = [
            'title' => 'Home | PT AMF'

        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | PT AMF'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl. abc no. 123',
                    'kota' => 'Malang'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Setiabudi No. 193',
                    'kota' => 'Malang'
                ]

            ]
        ];

        return view('pages/contact', $data);
    }
}
