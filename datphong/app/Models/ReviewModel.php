<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ReviewModel extends AdminModel
{
    protected $table = 'reviews';
    protected $folderUpload = 'review';
    protected $searchAccepted = ['name', 'country', 'message'];
    protected $guarded = ['_token'];

    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == "admin-list-items") {
            $query = self::select();

            if ($params['filter']['status'] !== "all")
                $query->where('status', $params['filter']['status']);

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->searchAccepted as $index => $column) {
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->searchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }

            if ($params['select']['value'] !== "" && $params['select']['value'] != 'default') {
                $query->where($params['select']['field'], $params['select']['value']);
            }

            $result = $query->sortLatest()->paginate($params['pagination']['totalItemsPerPage']);
        }

        return $result;
    }

    public function countItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'admin-count-items') {
            $query = $this::groupBy('status')
                ->select(DB::raw('status , COUNT(id) as count'));

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->searchAccepted as $index => $column) {
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->searchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }

            if ($params['select']['value'] !== "" && $params['select']['value'] != 'default') {
                $query->where($this->table . '.' . $params['select']['field'], '=', $params['select']['value']);
            }

            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-item') {
            $result = self::find($params['id']);
        }

        return $result;
    }

    public function saveItem($params = null, $options = null)
    {
        $username = session('userInfo')['username'];

        if ($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status]);
        }

        if ($options['task'] == 'add-item') {
            self::where('id', '>', 0)->increment('sort');
            $params['sort'] = 1;

            $params['created_by'] = $username;
            $params['created'] = date('Y-m-d H:i:s');

            self::create($this->prepareParams($params));
        }

        if ($options['task'] == 'edit-item') {
            $params['modified_by'] = $username;
            $params['modified'] = date('Y-m-d H:i:s');

            $object = self::find($params['id']);
            $object->update($params);
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $item = self::find($params['id']);
            $item->delete();
        }
    }
}
