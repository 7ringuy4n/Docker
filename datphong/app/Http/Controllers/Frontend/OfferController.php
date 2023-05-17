<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    private $pathViewController = 'frontend.pages.offer.';
    private $controllerName = 'offer';

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {

        return view($this->pathViewController . 'index');
    }

    public function profile(Request $request)
    {
        return view($this->pathViewController . 'profile');
    }

    public function support(Request $request)
    {
        return view($this->pathViewController . 'support');
    }

    public function contact(Request $request)
    {
        return view($this->pathViewController . 'contact');
    }

    public function emailSubscribe(Request $request)
    {
        $email = $request->email;
        $status = false;
        try {
            $model = new EmailSubscribeModel();
            $model->saveItem(['email' => $email], ['task' => 'add-item']);
            $status = true;
            $message = 'Success';
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }
        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function notfound(Request $request)
    {
        return view($this->pathViewController . 'not-found');
    }
}