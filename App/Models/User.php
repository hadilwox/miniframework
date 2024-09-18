<?php

namespace App\Models;
use App\Models\Contracts\MySQLBaseModel;

class User extends MySQLBaseModel
{
    protected $table = 'users';
    // public function __construct(){
    //     echo "User";
    // }
}