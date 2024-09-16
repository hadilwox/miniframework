<?php

define("BASEPATH", __DIR__ . "/../");

require_once BASEPATH . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(BASEPATH);
$dotenv->load();

$request = new App\Core\Request();


require_once BASEPATH . "helpers/helpers.php";

require_once BASEPATH . "routes/web.php";


