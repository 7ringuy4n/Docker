<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MediaModel extends AdminModel implements TranslatableContract
{
    use Translatable;

    protected $table = 'media';
    protected $folderUpload = 'media';
    protected $translatedAttributes = ['name'];
    protected $translationForeignKey = 'media_model_id';
    protected $searchAccepted = ['name'];
    protected $guarded = ['_token', 'images'];
    protected $path = '/upload/1/media';
    protected $translationTable = 'media_translations';

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
            $data_images = [];
            if (!empty($params['images'])) {
                $images = $params['images'];
                foreach ($images['name'] as $idx => $image) {
                    $data_images[] = [
                        'sort' => $idx + 1,
                        'name' => $image,
                        'alt' => $images['alt'][$idx]
                    ];
                    if (file_exists(public_path("images/tmp/media/$image"))) {
                        File::move(public_path("images/tmp/media/$image"), public_path("images/media/$image"));
                    }
                }
            }

            self::where('id', '>', 0)->increment('sort');
            $params['sort'] = 1;
            $params['created_by'] = $username;
            $params['created'] = date('Y-m-d H:i:s');

            $object = self::create($this->prepareParams($params));
            $object->images()->createMany($data_images);
            File::cleanDirectory(public_path('images/tmp/media/'));
        }

        if ($options['task'] == 'edit-item') {
            $data_images = [];
            if (!empty($params['images'])) {
                $images = $params['images'];
                foreach ($images['name'] as $idx => $image) {
                    $data_images[] = [
                        'id' => @$images['id'][$idx] ? intval($images['id'][$idx]) : null,
                        'media_id' => $params['id'],
                        'sort' => $idx + 1,
                        'name' => $image,
                        'alt' => $images['alt'][$idx]
                    ];
                    if (file_exists(public_path("images/tmp/media/$image"))) {
                        File::move(public_path("images/tmp/media/$image"), public_path("images/media/$image"));
                    }
                }
            }
            
            $params['modified_by'] = $username;
            $params['modified'] = date('Y-m-d H:i:s');

            $object = self::find($params['id']);
            $object->update($params);
            $deleteImages = ImagesModel::where('media_id', $params['id'])->whereNotIn('id', @$params['images']['id'] ?? [])->get();
            foreach ($deleteImages as $value) {
                if (file_exists("images/media/$value")) {
                    File::delete(public_path("images/media/$value"));
                }
                $value->delete();
            }
            foreach ($data_images as $image) {
                $object->images()->updateOrCreate(['id' => $image['id']], $image);
            }
            File::cleanDirectory(public_path('images/tmp/media/'));
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
        if ($options['task'] == 'delete-item')
            $item = self::find($params['id']);
            $item->delete();
    }

    public function getAll()
    {
        return $this->select()->where('status', '=', 'active')->orderBy('sort', 'desc')->get();
    }

    public function images()
    {
        return $this->hasMany(ImagesModel::class, 'media_id');
    }
}
