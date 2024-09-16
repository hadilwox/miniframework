<?php

namespace App\Middleware;
use App\Middleware\Contract\MiddlewareInterface;
use hisorange\BrowserDetect\Parser as Browser;


class BlockEdge implements MiddlewareInterface
{
    public function handle()
    {
        if (Browser::isEdge()) {
            die("Edge is Block");
        }
    }
}