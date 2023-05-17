<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Kalnoy\Nestedset\NodeTrait;

use Illuminate\Support\Facades\DB;

class CateConvenienceModel extends AdminModel implements TranslatableContract
{
    use Translatable;
    use NodeTrait;

    protected $table = 'cate_convenience';
    protected $translatedAttributes = ['name'];
    protected $translationForeignKey = 'cate_convenience_model_id';
    protected $folderUpload = 'cate_convenience';
    protected $searchAccepted = ['name'];
    protected $guarded = ['_token'];

    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == "admin-list-items") {
            $result = self::withTranslation()->withDepth()->having('depth', '>', 0)->defaultOrder()->get()->toTree();
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
                    $query->whereHas('slider_translations', function ($query) use ($params) {
                        foreach ($this->searchAccepted as $index => $column) {
                            if ($index == 0) {
                                $query->where($column, 'LIKE', "%{$params['search']['value']}%");
                            } else {
                                $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                            }
                        }
                    });
                } else if (in_array($params['search']['field'], $this->searchAccepted)) {
                    $query->whereHas('slider_translations', function ($query) use ($params) {
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
            $params['created_by'] = $username;
            $params['created'] = date('Y-m-d');
            $parent = self::find($params['parent_id']);
            self::create($this->prepareParams($params), $parent);
        }

        if ($options['task'] == 'edit-item') {
            $params['modified_by'] = $username;
            $params['modified'] = date('Y-m-d');

            $parent = self::find($params['parent_id']);
            $node = $current = self::find($params['id']);
            $node->update($this->prepareParams($params));
            if ($current->parent_id != $params['parent_id']) $node->appendToNode($parent)->save();
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $item = self::find($params['id']);
            $this->deleteThumb($item->id);
            $item->delete();
        }
    }

    public function getNameWithDepthAttribute()
    {
        return str_repeat(' /----- ', $this->depth) . $this->name;
    }

    public function conveniences()
    {
        return $this->hasMany(ConvenienceModel::class, 'category_id', 'id');
    }

    public function cate_convenience_translations()
    {
        return $this->hasMany(CateConvenienceModelTranslation::class, 'cate_convenience_model_id', 'id')->locale();
    }
}
