<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    private $pathViewController = 'frontend.pages.blog.';
    private $controllerName = 'blog';


    public function index()
    {
        return view($this->pathViewController . 'index');
    }

    public function detail()
    {
        return view($this->pathViewController . 'detail');
    }

    
}