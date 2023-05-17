<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ArticleModel;
use App\Models\CateConvenienceModel;
use App\Models\EmailSubscribeModel;
use App\Models\ReviewModel;
use App\Models\RoomModel;
use App\Models\SliderModel;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class IndexController extends Controller
{
    private $pathViewController = 'frontend.pages.index.';
    private $controllerName = 'index';

    public function __construct()
    {
        $this->locale = LaravelLocalization::getCurrentLocale();
        view()->share('controllerName', $this->controllerName);
        view()->share('locale', $this->locale);
    }

    public function index(Request $request)
    {
        $sliders = SliderModel::with('slider_translations')->active()->sortLatest()->get();
        $rooms = RoomModel::with('room_translations')->active()->sortLatest()->get();
        $reviews = ReviewModel::active()->sortLatest()->get();
        // return view($this->pathViewController . 'index', compact('sliders', 'reviews'));
        return view($this->pathViewController . 'index', compact('sliders', 'rooms', 'reviews'));
    }

    public function booking()
    {
        if (!session()->has('booking')) {
            return redirect()->route('index');
        }
        return view($this->pathViewController . 'booking');
    }

    public function bookingSuccess(Request $request)
    {
        if (!session()->has('booking')) {
            return redirect()->route('index');
        }
        $booking = session('booking');
        $room = RoomModel::find($booking['room_id']);
        $request->session()->forget('booking');
        return view($this->pathViewController . 'booking_success', compact($room));
    }

    public function notfound(Request $request)
    {
        return view($this->pathViewController . 'not-found');
    }
}
