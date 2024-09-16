<?php

namespace App\Controllers;

class PostController
{
    public function single()
    {
        global $request;
        $slug = $request->getRouteParam('slug');
        echo "Single From PostController $slug";
    }
    public function comment()
    {
        global $request;
        $slug = $request->getRouteParam('slug');
        $comment = $request->getRouteParam('cid');
        echo "from $slug Comment $comment : hello";
    }
}