<?php

namespace App\Models;
use App\Models\Contracts\MySQLBaseModel;

class Comment extends MySQLBaseModel
{
    protected $table = 'comments';

}