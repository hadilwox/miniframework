<?php

namespace App\Utilities;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Language
{
    
    public static function englishToPersian(string $text)
    {
        // Code
        $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
        $tr->setSource('en'); // Translate from English
        $tr->setSource(); // Detect language automatically
        $tr->setTarget('fa'); // Translate to Georgian
        return $tr->translate( $text);
    }

    public static function persianToEnglish(string $text)
    {
        $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
        $tr->setSource('fa'); // Translate from English
        $tr->setSource(); // Detect language automatically
        $tr->setTarget('en'); // Translate to Georgian
        return $tr->translate( $text);
    }
}