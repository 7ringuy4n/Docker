<?php

namespace App\Http\Controllers\Admin;

use App\Models\FacilityModel as MainModel;
use App\Http\Requests\FacilityRequest as MainRequest;

class FacilityController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.facility.';
        $this->controllerName = 'facility';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 15;
        parent::__construct();
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            // dd($params);

            $task = "add-item";
            $notify = "Thêm phần tử thành công!";

            if ($params['id'] !== null) {
                $task = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);

            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }
}