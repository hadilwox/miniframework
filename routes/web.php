<?php
use App\Core\Routing\Route;
use App\Middleware\BlockEdge;
use App\Middleware\BlockFireFox;
use App\Middleware\BlockIE;

Route::get('/', ['HomeController', 'index']);

Route::add(['get', 'post'], '/b', function () {
    echo "welcome to auth";
});


Route::get('/post/{slug}', ['PostController', 'single']);
Route::get('/post/{slug}/comment/{cid}', ['PostController', 'comment']);


Route::get('/panel', ['PanelController', 'panel']);
