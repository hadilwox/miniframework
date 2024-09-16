<?php

namespace App\Middleware;
use App\Middleware\Contract\MiddlewareInterface;
// use DeviceDetector\Parser\Client\Browser;
use hisorange\BrowserDetect\Parser as Browser;



class BlockFireFox implements MiddlewareInterface
{
    public function handle()
    {
        global $request;

        if (Browser::isFirefox()) {
            die("FireFox is Block");
        }

    }
}