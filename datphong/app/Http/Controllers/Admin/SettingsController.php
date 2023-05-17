<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmailBccModel;
use App\Models\EmailTemplateModel;
use Illuminate\Http\Request;
use App\Http\Requests\SettingsRequest as MainRequest;
use App\Models\SettingsModel as MainModel;

class SettingsController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.settings.';
        $this->controllerName = 'settings';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 30;
        parent::__construct();
    }

    public function form(Request $request)
    {
        $key_value = $request->key_value;
        $items = $this->model->getItem(null, ['task' => 'get-all']);

        $emailBccModel = new EmailBccModel();
        $emailBcc = $emailBccModel->listItems($this->params, ['task' => 'admin-list-items']);

        $emailTemplateModel = new EmailTemplateModel();
        $emailTemplate = $emailTemplateModel->listItems($this->params, ['task' => 'admin-list-items']);

        $arrEmailTemplate = [];
        foreach ($emailTemplate as $template)
            $arrEmailTemplate[$template->id] = $template->name;

        return view($this->pathViewController . 'form', [
            'items' => $items,
            'key_value' => $key_value,
            'emailBcc' => $emailBcc,
            'emailTemplate' => $emailTemplate,
            'arrEmailTemplate' => $arrEmailTemplate
        ]);
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $key_value = $params['key_value'];
            $task = "add-item";
            $msg = "Add item success!";
            $check = $this->model::where('key_value', $key_value)->exists();
            if ($check) {
                $task = "edit-item";
                $msg = "Update item success!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName . '/form', ['key_value' => $key_value])->with("zvn_notify", $msg);
        }
    }
}
