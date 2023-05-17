<?php

namespace App\Models;

use App\Models\Scope\CommonScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;

class AdminModel extends Model
{
    use CommonScopeTrait;

    public $timestamps = false;
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $table = '';
    protected $folderUpload = '';
    protected $searchAccepted = [
        'id',
        'name'
    ];

    protected $guarded = [];

    protected $crudNotAccepted = [
        '_token',
        'thumb_current',
        'image_current',
        'banner_current',
        'show_title',
        'show_des',
        'key_value',
        'document',
        'image_main_alt',
    ];

    public function uploadThumb($thumbObj)
    {
        $thumbName = Str::random(10) . '.' . $thumbObj->clientExtension();
        $thumbObj->storeAs($this->folderUpload, $thumbName, 'zvn_storage_image');
        return $thumbName;
    }

    public function deleteThumb($thumbName)
    {
        Storage::disk('zvn_storage_image')->delete($this->folderUpload . '/' . $thumbName);
    }

    public function prepareParams($params)
    {
        return array_diff_key($params, array_flip($this->crudNotAccepted));
    }

}

