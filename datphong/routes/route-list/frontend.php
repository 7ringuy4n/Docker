<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// $prefixFrontend = config('zvn.url.prefix_frontend');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        'namespace' => 'Frontend'
    ],
    function () {

        // ====================== AUTH ========================
        $prefix         = '';
        $controllerName = 'auth';

        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $prefixLogin = config('zvn.url.prefix_login');
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/' . $prefixLogin,     ['as' => $controllerName . '/login',     'uses' => $controller . 'login'])->middleware('check.login');;
            Route::post('/postLogin',   ['as' => $controllerName . '/postLogin',      'uses' => $controller . 'postLogin']);
            Route::get('/logout',       ['as' => $controllerName . '/logout',         'uses' => $controller . 'logout']);
        });

        // ============================== HOMEPAGE ==============================
        $prefix         = '';
        $controllerName = 'index';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',                 ['as' => $controllerName,               'uses' => $controller . 'index']);
            Route::get('/page-not-found',   ['as' => $controllerName . '/notfound', 'uses' => $controller . 'notfound']);
            Route::get('/booking',          ['as' => "{$controllerName}.booking",   'uses' => "{$controller}booking"]);
            Route::get('/booking-success',   ['as' => "{$controllerName}.booking.success",   'uses' => "{$controller}bookingSuccess"]);
        });

        // ====================== FACILITY ========================
        $prefix         = 'facility';
        $controllerName = 'facility';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/{slug}-{facility}.html',   ['as' => "{$controllerName}.detail", 'uses' => "{$controller}detail"])->where('slug', '[0-9a-zA-Z_-]+');
        });

        // ====================== BENEFIT ========================
        $prefix         = 'benefit';
        $controllerName = 'benefit';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/', ['as' => "{$controllerName}.index",   'uses' => "{$controller}index"]);
        });

        // ====================== GALLERY ========================
        $prefix         = 'gallery';
        $controllerName = 'gallery';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/', ['as' => "{$controllerName}.index",   'uses' => "{$controller}index"]);
        });

        // ============================== CONTACT ==============================
        $prefix         = 'contact';
        $controllerName = 'contact';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/',  ['as' => "{$controllerName}.index",    'uses' => $controller . 'index']);
            // Route::post('/post-contact',  ['as' => "{$controllerName}.post_contact",    'uses' => $controller . 'postContact']);
        });

        // ==============================  ROOM ==============================
        $prefix         = 'room';
        $controllerName = 'room';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/{slug}-{room}.html',   ['as' => "{$controllerName}.detail", 'uses' => $controller . 'detail'])
                ->where('slug', '[0-9a-zA-Z_-]+');
        });

        $prefix = 'backup';
        $controllerName = 'backup';
        Route::group(['prefix' => $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName) . 'Controller@';
            Route::get('create-db', ['as' => $controllerName . '/createDatabase', 'uses' => $controller . 'createDatabase']);
            Route::get('delete-db', ['as' => $controllerName . '/deleteDatabase', 'uses' => $controller . 'deleteDatabase']);
            Route::get('create-files', ['as' => $controllerName . '/createFiles', 'uses' => $controller . 'createFiles']);
            Route::get('delete-files', ['as' => $controllerName . '/deleteFiles', 'uses' => $controller . 'deleteFiles']);
        });

        // ============================== ABOUT ==============================
        $prefix         = '';
        $controllerName = 'about';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/about',                                 ['as' => $controllerName,                                          'uses' => $controller . 'index']);
        });



        // ==============================  CHECKOUT ==============================
        $prefix         = '';
        $controllerName = 'checkout';
        Route::group(['prefix' =>  $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName)  . 'Controller@';
            Route::get('/checkout',                                 ['as' => $controllerName,                                          'uses' => $controller . 'index']);
        });
    }
);
