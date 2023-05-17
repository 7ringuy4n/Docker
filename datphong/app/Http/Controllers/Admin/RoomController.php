<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoomModel as MainModel;
use App\Http\Requests\RoomRequest as MainRequest;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    private $pathViewController = 'admin.pages.room.';
    private $controllerName = 'room';
    private $params = [];
    private $model;
    private $path = '/upload/1/room';

    public function __construct()
    {
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        view()->share('controllerName', $this->controllerName);
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
        $key_value = $request->key_value;
        if ($request->id !== null) {
            $params["id"] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-info']);
        }
        return view($this->pathViewController . 'form', [
            'item' => $item,
            'key_value' => $key_value
        ]);
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $task = "add-item";
            $msg = "Thêm phần tử thành công!";
            if ($params['id'] !== null) {
                $task = "edit-item";
                $msg = "Cập nhật phần tử thành công!";
            }
            $idNew = $this->model->saveItem($params, ['task' => $task]);
            $id = ($task == 'add-item') ? $idNew : $request->id;
            return redirect()->route($this->controllerName)->with("zvn_notify", $msg);
        }
    }

    public function update(Request $request)
    {
        if ($request->method() == 'POST') {
            $msg = null;
            $params = $request->all();
            if($params['type'] == 'ordering') {
                if(!empty($params['cid'])) {
                    foreach ($params['cid'] as $id => $value)
                        $this->model->saveItem(['sort' => $params['ordering'][$id], 'id' => $id], ['task' => 'edit-item']);
                    $msg = 'Cập nhật sắp xếp thành công!';
                }
            }

            return redirect()->route($this->controllerName)->with("zvn_notify", $msg);
        }
    }

    public function upload(Request $request)
    {
        $path = public_path('images/tmp/room');

        if (!file_exists($path)) mkdir($path, 0777, true);

        $file = $request->file('file');
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = Str::slug($name) . '_' . uniqid() . '.' . $file->clientExtension();
        $file->storeAs('tmp/room', $fileName, 'zvn_storage_image');

        return response()->json([
            'name' => $fileName,
            'image_url' => asset('images/tmp/room/' . $fileName),
            'original_name' => $file->getClientOriginalName(),
        ]);
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
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function ordering(Request $request)
    {
        $params["id_current"] = $request->id_current;
        $params["id_change"] = $request->id_change;
        $this->model->ordering($params);
        return back()->with("zvn_notify", "Sắp xếp phần tử thành công!");
    }

    public function config(Request $request)
    {
        try {
            $params["config"] = $request->config;
            $params["currentConfig"] = $request->value;
            $params["id"] = $request->id;

            $this->model->saveItem($params, ['task' => 'change-config']);
            $response = ($params["currentConfig"] == 1) ? 0 : 1;
            return response()->json([
                'status' => true,
                'response' => $response,
                'link' => route($this->controllerName . '/config', ['config' => $params['config'], 'value' => $response,'id' => $params["id"]])
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function attribute(Request $request)
    {
        try {
            $params = [
                'id' => $request->id,
                $request->field => $request->value
            ];
            $this->model->saveItem($params, ['task' => 'edit-item']);
            return response()->json([
                'status' => true,
            ]);
        } catch (\Exception $e) {
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

        return redirect()->route($this->controllerName)->with("zvn_notify", "Xóa phần tử thành công!");
    }
}
