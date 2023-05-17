<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ContactController extends Controller
{
    private $pathViewController = 'frontend.pages.contact.';
    private $controllerName = 'contact';

    public function __construct()
    {
        $this->locale = LaravelLocalization::getCurrentLocale();
        view()->share('controllerName', $this->controllerName);
        view()->share('locale', $this->locale);
    }

    public function index(Request $request)
    {
        return view($this->pathViewController . 'index');
    }
}
