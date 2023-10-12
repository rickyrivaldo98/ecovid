<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data['meta'] = [
            'title' => 'Login | FKM COVID-19',
        ];
        return view('auth/login',$data);
    }
}
