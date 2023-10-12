<?php

namespace App\Controllers;

class ForgotPassword extends BaseController
{
    public function index()
    {
        $data['meta'] = [
            'title' => 'Forgot Password | FKM COVID-19',
        ];
        return view('auth/forgotPassword',$data);
    }
}
