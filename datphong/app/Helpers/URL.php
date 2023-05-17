<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class URL
{
    public static function blog($id, $name) 
    {
        return route('blog/index', [
            'category_id'   => $id, 
            'category_name' => Str::slug($name) 
        ]);

    }

    public static function blogDetail($id, $name) 
    {
        return route('blogdetail/index', [
            'article_id'   => $id, 
            'article_name' => Str::slug($name) 
        ]);

    }
    public static function roomDetail($id, $name) 
    {
        return route('roomdetail/index', [
            'room_id'   => $id, 
            'room_name' => Str::slug($name) 
        ]);

    }
}