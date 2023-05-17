<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RoomModel extends AdminModel implements TranslatableContract
{
    use Translatable;

    protected $tmp = 'images/tmp/room/';
    protected $table = 'room';
    protected $folderUpload = 'images/room/';
    protected $searchAccepted = ['name', 'overview', 'content'];
    protected $translatedAttributes = ['name', 'overview', 'content', 'meta_title', 'meta_description', 'meta_keyword'];
    protected $translationForeignKey = 'room_model_id';
    protected $translationTable = 'room_translations';
    protected $guarded = ['_token', 'delete_images', 'delete_images_extra'];

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
            $data = $params;

            if (!empty($data['price_day']))
                $data['price_day'] = str_replace(',', '', $params['price_day']);

            if (!empty($data['price_month']))
                $data['price_month'] = str_replace(',', '', $params['price_month']);

            if (!empty($params['images'])) {
                $images = $params['images'];
                foreach ($images['name'] as $idx => $image) {
                    $params_images[] = [
                        'name' => $image,
                        'alt' => $images['alt'][$idx]
                    ];
                    if (file_exists(public_path("{$this->tmp}$image"))) {
                        File::move(public_path("{$this->tmp}$image"), public_path("{$this->folderUpload}$image"));
                    }
                }
            }

            if (!empty($params['images_extra'])) {
                $images_extra = $params['images_extra'];
                foreach ($images_extra['name'] as $idx => $image_extra) {
                    $params_images_extra[] = [
                        'name' => $image_extra,
                        'alt' => $images_extra['alt'][$idx]
                    ];
                    if (file_exists(public_path("{$this->tmp}$image_extra"))) {
                        File::move(public_path("{$this->tmp}$image_extra"), public_path("{$this->folderUpload}$image_extra"));
                    }
                }
            }

            $data['images'] = json_encode(@$params_images ?? []);
            $data['images_extra'] = json_encode(@$params_images_extra ?? []);
            $data['created_by'] = $username;
            $data['created'] = date('Y-m-d H:m:s', time());

            self::create($this->prepareParams($data));
            File::cleanDirectory(public_path($this->tmp));
        }

        if ($options['task'] == 'edit-item') {

            $data = $params;
            $params_images = [];

            if (!empty($params['images'])) {
                $images = $params['images'];
                foreach ($images['name'] as $idx => $image) {
                    $params_images[] = [
                        'name' => $image,
                        'alt' => $images['alt'][$idx]
                    ];
                    if (file_exists(public_path("{$this->tmp}$image"))) {
                        File::move(public_path("{$this->tmp}$image"), public_path("{$this->folderUpload}$image"));
                    }
                }
            }

            if (!empty($params['images_extra'])) {
                $images_extra = $params['images_extra'];
                foreach ($images_extra['name'] as $idx => $image_extra) {
                    $params_images_extra[] = [
                        'name' => $image_extra,
                        'alt' => $images_extra['alt'][$idx]
                    ];
                    if (file_exists(public_path("{$this->tmp}$image_extra"))) {
                        File::move(public_path("{$this->tmp}$image_extra"), public_path("{$this->folderUpload}$image_extra"));
                    }
                }
            }

            if (!empty($params['delete_images'])) {
                $imagesDelete = explode('||', $params['delete_images']);
                foreach ($imagesDelete as $value) {
                    if (file_exists("{$this->folderUpload}$value")) {
                        File::delete(public_path("{$this->folderUpload}$value"));
                    }
                }
            }

            if (!empty($params['delete_images_extra'])) {
                $imagesDeleteExtra = explode('||', $params['delete_images_extra']);
                foreach ($imagesDeleteExtra as $valueExtra) {
                    if (file_exists("{$this->folderUpload}$valueExtra")) {
                        File::delete(public_path("{$this->folderUpload}$valueExtra"));
                    }
                }
            }
            
            if (!empty($data['price_day']))
            $data['price_day'] = str_replace(',', '', $params['price_day']);
            
            if (!empty($data['price_month']))
            $data['price_month'] = str_replace(',', '', $params['price_month']);
            
            $data['images'] = json_encode(@$params_images ?? []);
            $data['images_extra'] = json_encode(@$params_images_extra ?? []);
            $data['modified_by'] = $username;
            $data['modified'] = date('Y-m-d H:m:s', time());

            $object = self::find($params['id']);
            $object->update($data);
        }
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-all') {
            $result = self::select()->get();
        }

        if ($options['task'] == 'get-info') {
            $result = self::select()->where('id', '=', $params['id'])->first();
        }

        if ($options['task'] == 'get-item') {
            $result = self::select()->where('id', '=', $params['id'])->first();
        }

        return $result;
    }

    public function ordering($params = null, $options = null)
    {
        $itemCurrent = $this->getItem(['id' => $params['id_current']], ['task' => 'get-item']);
        $itemChange = $this->getItem(['id' => $params['id_change']], ['task' => 'get-item']);

        self::where('id', $itemCurrent->id)->update(['sort' => $itemChange->sort]);
        self::where('id', $itemChange->id)->update(['sort' => $itemCurrent->sort]);
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $item = self::find($params['id']);
            $images = json_decode($item->images);
            $imagesExtra = json_decode($item->images_extra);
            foreach ($images as $image) {
                if (file_exists(public_path("{$this->folderUpload}$image"))) {
                    File::delete(public_path("{$this->folderUpload}$image"));
                }
            }

            foreach ($imagesExtra as $imageExtra) {
                if (file_exists(public_path("{$this->folderUpload}$imageExtra"))) {
                    File::delete(public_path("{$this->folderUpload}$imageExtra"));
                }
            }
            $item->delete();
        }
    }

    public function getItemsNew()
    {
        return $this->select()
            ->where('config', 'like', '%"1":"1"%')
            ->Where('status', '=', 'active')
            ->limit(config('zvn.room_config.countroomNew'))
            ->orderBy('sort', 'asc')
            ->get();
    }

    public function getItemsRelative($supplierId, $id, $limit = 4)
    {
        return $this->select()
            ->where('status', 'active')
            ->where('supplier_id', $supplierId)
            ->where('id', '<>', $id)
            ->limit($limit)
            ->get();
    }

    public function getItemCategory($slug, $limit = 12)
    {
        return $this->select($this->table . '.*')
            ->join('cate_room', 'cate_room.id', '=', $this->table . '.id')
            ->where($this->table . '.status', 'active')
            ->where('cate_room.slug', '=', $slug)
            ->orderBy($this->table . '.sort', 'asc')
            ->paginate($limit);
    }

    public function getItemSearch($keyword, $locale)
    {
        return $this->select($this->table . '.*')
            ->join('room_translations', 'room_translations.room_model_id', '=', $this->table . '.id')
            ->where($this->table . '.status', 'active')
            ->where('room_translations.name', 'like', "%$keyword%")
            ->where('room_translations.locale', $locale)
            ->orderBy($this->table . '.sort', 'asc')
            ->get();
    }

    public function room_translations()
    {
        return $this->hasMany(RoomModelTranslation::class, 'room_model_id', 'id')->locale();
    }
}
