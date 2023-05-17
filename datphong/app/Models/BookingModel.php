<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class BookingModel extends AdminModel
{
    protected $table = 'booking';
    protected $folderUpload = 'booking';
    protected $searchAccepted = ['name', 'surname', 'company', 'phone', 'email', 'question'];
    protected $guarded = ['_token', 'thumb_current', 'room_name'];

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

            $result = $query->latest()->paginate($params['pagination']['totalItemsPerPage']);
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

    public function saveItem($params = null, $options = null)
    {
        $username = session('userInfo')['username'];

        if ($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status]);
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $item = self::find($params['id']);
            $item->delete();
        }
    }

    public function room()
    {
        return $this->belongsTo(RoomModel::class, 'room_id', 'id');
    }
}
