<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CateNewsRequest as MainRequest;
use App\Models\CateNewsModel as MainModel;

class CateNewsController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.cate_news.';
        $this->controllerName = 'cateNews';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 30;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params["search"]["field"] = $request->input('search_field', null);
        $this->params["search"]["value"] = $request->input('search_value', null);
        $this->params["select"]["field"] = $request->input('select_field', null);
        $this->params["select"]["value"] = $request->input('select_value', 'default');

        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items']);

        return view($this->pathViewController . 'index', [
            'params' => $this->params,
            'items' => $items,
            'itemsStatusCount' => $itemsStatusCount,
        ]);
    }

    public function form(Request $request)
    {
        $item = null;
        $itemContents = null;
        if ($request->id !== null) {
            $params["id"] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
        }

        return view($this->pathViewController . 'form', [
            'item' => $item,
        ]);
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
