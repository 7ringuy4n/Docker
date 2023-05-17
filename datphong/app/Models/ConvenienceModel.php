<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Support\Facades\DB;

class ConvenienceModel extends AdminModel implements TranslatableContract
{
    use Translatable;

    protected $table = 'convenience';
    protected $translatedAttributes = ['name'];
    protected $translationForeignKey = 'convenience_model_id';
    protected $folderUpload = 'convenience';
    protected $searchAccepted = ['name'];
    protected $guarded = ['_token'];
    protected $translationTable = 'convenience_translations';

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
            $translations = $this->table . '_translations';
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
            $params['created'] = date('Y-m-d');

            self::create($this->prepareParams($params));
        }

        if ($options['task'] == 'edit-item') {
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
            $item->delete();
        }
    }

    public function cateConvenience()
    {
        return $this->belongsTo(CateConvenienceModel::class, 'category_id', 'id')->first();
    }

    public function convenience_translations()
    {
        return $this->hasMany(ConvenienceModelTranslation::class, 'convenience_model_id', 'id')->locale();
    }
}
