<?php

namespace App\Models;
use App\Models\Contracts\MySQLBaseModel;

class Product extends MySQLBaseModel
{
    protected $table = 'products';

}