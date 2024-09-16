<?php

function siteUrl($route)
{
    return $_ENV['DOMIN'] . "$route";
}

function assetsUrl($route)
{
    return siteUrl("assets/" . $route);
}

function randomElement($arry)
{
    shuffle($arry);
    return array_pop($arry);
}

function dd($data)
{
    echo '<pre style="width:26rem;margin:30px 30px;  position: static;z-index: 99;font-size: 18px;font-weight: bold;padding: 5px 10px;background-color: #272727;color: aliceblue;border-radius: 10px;line-height: 26px;text-wrap:balance;">';
    var_dump($data);
    echo "</pre>";
}

function view($path, $data = [])
{
    extract($data);
    $path = str_ireplace(".", "/", $path);
    $viewFullPath = BASEPATH . "views/$path.php";
    include_once $viewFullPath;

}