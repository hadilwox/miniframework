<?php

namespace App\Utilities;

class Asset
{
    public static function css(string $route)
    {
        return $_ENV['DOMIN'] . "assets/css/" . $route;
    }
    public static function js(string $route)
    {
        return $_ENV['DOMIN'] . "assets/js/" . $route;
    }
    public static function font(string $route)
    {
        return $_ENV['DOMIN'] . "assets/fonts/" . $route;
    }
}