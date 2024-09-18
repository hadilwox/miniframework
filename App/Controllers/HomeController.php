<?php

namespace App\Controllers;
use App\Models\User;

class HomeController
{
    public function index()
    {
        $id = 1;
        // $user = (new User())->find($id);
        // $result = $userModel->find(2);
        $user = new User($id);
        // $result = $user->remove();

        $user->name = 'Sara';
        $user->email = 'sara452$gmail.com';
        $user->password = 'sara84980844242';


        $user->save();

        dd($user->getAllAttributes());

        // dd($user->name);
        // dd($result);
        // echo $result->id;

        view("home.index");
    }
}