<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FacilityModel;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FacilityController extends Controller
{
    private $pathViewController = 'frontend.pages.facility.';
    private $controllerName = 'facility';

    public function __construct()
    {
        $this->locale = LaravelLocalization::getCurrentLocale();
        view()->share('controllerName', $this->controllerName);
        view()->share('locale', $this->locale);
    }

    public function detail(Request $request, $slug, FacilityModel $facility)
    {
        return view("{$this->pathViewController}detail", compact('facility'));
    }
}
