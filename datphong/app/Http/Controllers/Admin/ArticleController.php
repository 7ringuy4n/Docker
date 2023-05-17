<?php

namespace App\Http\Controllers\Admin;

use App\Models\CateNewsModel;
use App\Http\Requests\ArticleRequest as MainRequest;
use App\Models\ArticleModel as MainModel;
use App\Models\TagsModel;

class ArticleController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.article.';
        $this->controllerName = 'article';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 30;

        $categoryModel = new CateNewsModel();
        $category = $categoryModel->listItems(null, ['task' => 'select-items']);
        view()->share('category', $category);

        parent::__construct();
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();

            $task = "add-item";
            $notify = "Add item success!";

            if ($params['id'] !== null) {
                $task = "edit-item";
                $notify = "Update item success!";
            }
            $this->model->saveItem($params, ['task' => $task]);

            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }
}