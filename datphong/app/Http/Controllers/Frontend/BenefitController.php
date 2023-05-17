<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BenefitModel;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BenefitController extends Controller
{
    private $pathViewController = 'frontend.pages.benefit.';
    private $controllerName = 'benefit';

    public function __construct()
    {
        $this->locale = LaravelLocalization::getCurrentLocale();
        view()->share('controllerName', $this->controllerName);
        view()->share('locale', $this->locale);
    }

    public function index()
    {
        $benefits = BenefitModel::translatedIn($this->locale)->active()->sortLatest()->get();
        return view("{$this->pathViewController}index", compact('benefits'));
    }
}
