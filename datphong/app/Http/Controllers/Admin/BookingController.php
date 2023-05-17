<?php

namespace App\Http\Controllers\Admin;

use App\Models\BookingModel as MainModel;
use Illuminate\Http\Request;

class BookingController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.booking.';
        $this->controllerName = 'booking';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 15;
        parent::__construct();
    }

    // public function save(Request $request)
    // {
    //     if ($request->method() == 'POST') {
    //         $params = $request->all();

    //         $task = "add-item";
    //         $notify = "Thêm phần tử thành công!";

    //         if ($params['id'] !== null) {
    //             $task = "edit-item";
    //             $notify = "Cập nhật phần tử thành công!";
    //         }
    //         $this->model->saveItem($params, ['task' => $task]);

    //         return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
    //     }
    // }
}