<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ImagesModel;
use App\Models\MediaModel;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GalleryController extends Controller
{
    private $pathViewController = 'frontend.pages.gallery.';
    private $controllerName = 'gallery';

    public function __construct()
    {
        $this->locale = LaravelLocalization::getCurrentLocale();
        view()->share('controllerName', $this->controllerName);
        view()->share('locale', $this->locale);
    }

    public function index(Request $request)
    {
        $medias = MediaModel::translatedIn($this->locale)->active()->sortLatest()->get();
        $images = ImagesModel::with('media')->whereIn('media_id', $medias->pluck('id'))->get();
        return view($this->pathViewController . 'index', compact('medias', 'images'));
    }

    public function notfound(Request $request)
    {
        return view($this->pathViewController . 'not-found');
    }
}