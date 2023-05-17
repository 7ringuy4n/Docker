<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagsRequest as MainRequest;
use App\Models\TagsModel as MainModel;

class TagsController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.tags.';
        $this->controllerName = 'tags';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;

        parent::__construct();
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $task = "add-item";
            $msg = "Add item success!";

            if ($params['id'] !== null) {
                $task = "edit-item";
                $msg = "Update item success!";
            }
            $this->model->saveItem($params, ['task' => $task]);

            return redirect()->route($this->controllerName)->with("zvn_notify", $msg);
        }
    }
}
