<?php

namespace App\Models;

use DB;

class ImagesModel extends AdminModel
{

    protected $table = 'images';
    protected $searchAccepted = ['name'];

    public function saveItem($params = null, $options = null)
    {
        $username = session('userInfo')['username'];

        if ($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status]);
        }

        if ($options['task'] == 'add-item') {

            $params['created_by'] = $username;
            $params['created'] = date('Y-m-d H:m:s', time());

            self::insert($this->prepareParams($params));
        }

        if ($options['task'] == 'edit-item') {

            $params['modified_by'] = $username;
            $params['modified'] = date('Y-m-d H:m:s', time());

            self::where(['id' => $params['id']])->update($this->prepareParams($params));
        }
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;
        if ($options['task'] == 'get-item') {
            $result = self::select()->where('id', $params['id'])->first();
        }

        return $result;
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
    }

    public function media()
    {
        return $this->belongsTo(MediaModel::class, 'media_id', 'id');
    }
}
