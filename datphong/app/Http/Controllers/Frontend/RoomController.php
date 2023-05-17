<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RoomModel;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RoomController extends Controller
{
    private $pathViewController = 'frontend.pages.room.';
    private $controllerName = 'room';

    public function __construct()
    {
        $this->locale = LaravelLocalization::getCurrentLocale();
        view()->share('controllerName', $this->controllerName);
        view()->share('locale', $this->locale);
    }

    public function detail(Request $request, $slug, RoomModel $room)
    {
        $otherRooms = RoomModel::with('room_translations')->whereKeyNot($room->id)->active()->sortLatest()->get();
        return view($this->pathViewController . 'detail', compact('room', 'otherRooms'));
    }
}