<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;    
use App\Http\Controllers\Controller;

class BlogdetailController extends Controller
{
    private $pathViewController = 'frontend.pages.blogdetail.';
    private $controllerName = 'blogdetail';


    public function index(Request $request)
    { 
        return view($this->pathViewController . 'index');
    }

    public function detail()
    {
        return view($this->pathViewController . 'detail');
    }

    
}