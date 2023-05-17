<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\DB;

class SliderModel extends AdminModel implements TranslatableContract
{
    use Translatable;

    protected $table = 'slider';
    protected $translatedAttributes = ['name', 'description'];
    protected $translationForeignKey = 'slider_model_id';
    protected $folderUpload = 'slider';
    protected $searchAccepted = ['name', 'description'];
    protected $guarded = ['_token', 'thumb_current'];
    protected $translationTable = 'slider_translations';

    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == "admin-list-items") {
            $query = self::withTranslation();

            if ($params['filter']['status'] !== "all")
                $query->where('status', $params['filter']['status']);

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->whereHas($this->translationTable, function ($query) use ($params) {
                        foreach ($this->searchAccepted as $index => $column) {
                            if ($index == 0) {
                                $query->where($column, 'LIKE', "%{$params['search']['value']}%");
                            } else {
                                $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                            }
                        }
                    });
                } else if (in_array($params['search']['field'], $this->searchAccepted)) {
                    $query->whereHas($this->translationTable, function ($query) use ($params) {
                        $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                    });
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
                    $query->whereHas($this->translationTable, function ($query) use ($params) {
                        foreach ($this->searchAccepted as $index => $column) {
                            if ($index == 0) {
                                $query->where($column, 'LIKE', "%{$params['search']['value']}%");
                            } else {
                                $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                            }
                        }
                    });
                } else if (in_array($params['search']['field'], $this->searchAccepted)) {
                    $query->whereHas($this->translationTable, function ($query) use ($params) {
                        $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                    });
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
            $result = self::select()->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
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
            $params['thumb'] = $this->uploadThumb($params['thumb']);

            $params['created_by'] = $username;
            $params['created'] = date('Y-m-d');

            self::create($this->prepareParams($params));
        }

        if ($options['task'] == 'edit-item') {
            if (!empty($params['thumb'])) {
                $this->deleteThumb($params['thumb_current']);
                $params['thumb'] = $this->uploadThumb($params['thumb']);
            }
            $params['modified_by'] = $username;
            $params['modified'] = date('Y-m-d');

            $object = self::find($params['id']);
            $object->update($params);
        }
    }

    public function ordering($params = null, $options = null)
    {
        $itemCurrent = self::find($params['id_current']);
        $itemChange = self::find($params['id_change']);

        self::where('id', $itemCurrent->id)->update(['sort' => $itemChange->sort]);
        self::where('id', $itemChange->id)->update(['sort' => $itemCurrent->sort]);
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $item = self::find($params['id']);
            $this->deleteThumb($item->id);
            $item->delete();
        }
    }

    public function getItemsHome($limit = 10)
    {
        return $this->where('status', 'active')
            ->orderBy('sort', 'asc')
            ->offset(0)
            ->limit($limit)
            ->get();
    }

    public function slider_translations()
    {
        return $this->hasMany(SliderModelTranslation::class, 'slider_model_id', 'id')->locale();
    }
}
