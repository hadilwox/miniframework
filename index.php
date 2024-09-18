<?php
use App\Core\Routing\Router;
use App\Core\Routing\Route;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;

include_once "bootstrap/init.php";

$router = new Router();
$router->run();


