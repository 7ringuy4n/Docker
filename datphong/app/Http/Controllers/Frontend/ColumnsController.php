<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ColumnsController extends Controller
{
    private $pathViewController = 'frontend.pages.columns.';
    private $controllerName = 'columns';


    public function index()
    {
        return view($this->pathViewController . 'index');
    }

    public function detail()
    {
        return view($this->pathViewController . 'detail');
    }

    
}