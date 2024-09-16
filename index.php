<?php
use App\Core\Routing\Router;
use App\Core\Routing\Route;

include_once "bootstrap/init.php";

$router = new Router();
$router->run();

