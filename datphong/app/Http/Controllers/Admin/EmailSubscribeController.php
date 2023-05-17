<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmailSubscribeModel as MainModel;

class EmailSubscribeController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.email_subscribe.';
        $this->controllerName = 'emailSubscribe';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;

        parent::__construct();
    }
}
