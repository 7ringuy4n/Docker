<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $pathViewController = 'frontend.pages.product.';
    private $controllerName = 'product';


    public function category()
    {
        return view($this->pathViewController . 'category');
    }

    public function detail()
    {
        return view($this->pathViewController . 'detail');
    }

    public function cart()
    {
        return view($this->pathViewController . 'cart');
    }
}