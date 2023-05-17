<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Models\EmailTemplateModel as MainModel;
use App\Http\Requests\EmailTemplateRequest as MainRequest;

class EmailTemplateController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.email_template.';
        $this->controllerName = 'emailTemplate';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 50;
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

            return redirect()->route('settings/form', ['key_value' => 'setting-email'])->with("zvn_notify", $notify);
        }
    }

    public function status(Request $request)
    {
        try {
            $params["currentStatus"] = $request->status;
            $params["id"] = $request->id;
            $this->model->saveItem($params, ['task' => 'change-status']);
            $response = ($params["currentStatus"] == 'active') ? 'inactive' : 'active';

            return response()->json([
                'status' => true,
                'response' => $response,
                'link' => route($this->controllerName . '/status', ['status' => $response, 'id' => $params["id"]])
            ]);

        } catch (Exception $e) {

            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ]);

        }
    }

    public function delete(Request $request)
    {
        $params["id"] = $request->id;
        $this->model->deleteItem($params, ['task' => 'delete-item']);

        return redirect()->route('settings/form', ['key_value' => 'setting-email'])->with("zvn_notify", 'Delete item success!');
    }
}