<?php

namespace App\Http\Controllers\Admin;

use App\Models\ConvenienceModel as MainModel;
use App\Http\Requests\ConvenienceRequest as MainRequest;
use App\Models\CateConvenienceModel;
use Illuminate\Http\Request;

class ConvenienceController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.convenience.';
        $this->controllerName = 'convenience';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 15;
        parent::__construct();
    }

    public function form(Request $request)
    {
        $item = null;
        if ($request->id !== null) {
            $params["id"] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
        }

        $categories = CateConvenienceModel::withDepth()->having('depth', '>', 0)->defaultOrder()->get()->toFlatTree()->pluck('name_with_depth', 'id');

        return view($this->pathViewController .  'form', [
            'item'        => $item,
            'categories' => $categories
        ]);
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();

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
