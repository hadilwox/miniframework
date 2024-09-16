<?php

namespace App\Controllers;

class AuthController
{
    public function login()
    {
        $data = [
            'title' => 'login for Framwork'
        ];
        view("auth.login", $data);
    }
}