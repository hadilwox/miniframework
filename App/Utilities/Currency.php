<?php

namespace App\Utilities;
class Currency{
    public static function formatPriceInMillionToman(int $amount)
    {
        return $amount / 1000;
    }

    public static function formatPriceInHezarToman(int $amount)
    {
        return $amount / 1000;
    }

    public static function formatPriceInToman(int $amount)
    {
        return $amount ;
    }

    public static function formatPriceInHezarRiyal(int $amount)
    {
        return $amount * 10;
    }
}