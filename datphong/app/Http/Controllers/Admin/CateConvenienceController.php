<?php

namespace App\Http\Controllers\Admin;

use App\Models\CateConvenienceModel as MainModel;
use App\Http\Requests\CateConvenienceRequest as MainRequest;
use Illuminate\Http\Request;

class CateConvenienceController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.cate_convenience.';
        $this->controllerName = 'cateConvenience';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 15;
        parent::__construct();
    }

    public function updateTree(Request $request)
    {
        $data = $request->data;
        $root = MainModel::find(1);
        MainModel::rebuildSubtree($root, $data);
        return response()->json($data);
    }

    public function form(Request $request)
    {
        $item = null;
        $categories = MainModel::withDepth()->defaultOrder();
        if ($request->id !== null) {
            $params["id"] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
            $categories = $categories->where('_lft', '<', $item->_lft)->orWhere('_lft', '>', $item->_rgt);
        }
        $categories = $categories->get()->toFlatTree()->pluck('name_with_depth', 'id');

        return view($this->pathViewController .  'form', [
            'item'          => $item,
            'categories'    => $categories
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