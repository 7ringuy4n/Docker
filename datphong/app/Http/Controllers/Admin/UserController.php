<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ChangePasswordRequests;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\UserModel as MainModel;
use App\Http\Requests\UserRequest as MainRequest;

class UserController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.user.';
        $this->controllerName = 'user';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 5;
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

    public function changeLevel(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $this->model->saveItem($params, ['task' => 'change-level-post']);
            return redirect()->route($this->controllerName)->with("zvn_notify", "Thay đổi level thành công!");
        }
    }

    public function changePassword()
    {
        $userInfo = session()->get('userInfo');
        $email = $userInfo['email'];

        return view($this->pathViewController . 'form_change_password', [
            'email' => $email
        ]);
    }

    public function postChangePassword(ChangePasswordRequests $request)
    {
        $userInfo = session()->get('userInfo');
        $user = UserModel::find($userInfo['id']);

        if ($request->isMethod('post')) {
            $user->password = md5($request->get('password_new'));
            $user->save();
        }
        return redirect(url()->previous())->with("zvn_notify", "Thay đổi thành công!");
    }

    public function level(Request $request)
    {
        $params["currentLevel"] = $request->level;
        $params["id"] = $request->id;
        $this->model->saveItem($params, ['task' => 'change-level']);
        return redirect()->route($this->controllerName)->with("zvn_notify", "Cập nhật kiểu hiện thị thành công!");
    }
}