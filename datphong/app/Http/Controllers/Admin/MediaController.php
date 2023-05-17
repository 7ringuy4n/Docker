<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediaModel as MainModel;
use App\Http\Requests\MediaRequest as MainRequest;
use Illuminate\Http\Request;

class MediaController extends AdminController
{
    private $path = '/upload/1/media';

    public function __construct()
    {
        $this->pathViewController = 'admin.pages.media.';
        $this->controllerName = 'media';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 30;

        view()->share('controllerName', $this->controllerName);
        parent::__construct();
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

    public function upload(Request $request)
    {
        $path = public_path('images/tmp/media');

        if (!file_exists($path)) mkdir($path, 0777, true);

        $file = $request->file('file');
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $name . '_' . uniqid() . '.' . $file->clientExtension();
        $file->storeAs('tmp/media', $fileName, 'zvn_storage_image');

        return response()->json([
            'name' => $fileName,
            'image_url' => asset('images/tmp/media/' . $fileName),
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}