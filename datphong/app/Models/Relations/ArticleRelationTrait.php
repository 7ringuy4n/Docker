<?php

namespace App\Models\Relations;

use App\Models\ArticleTagsModel;
use App\Models\CateNewsModel;
use App\Models\TagsModel;

trait ArticleRelationTrait
{
    public function category()
    {
        return $this->belongsTo(CateNewsModel::class, 'category_id');
    }

    public function articleTags()
    {
        return $this->hasMany(ArticleTagsModel::class, 'article_id');
    }

    public function tags()
    {
        return $this->belongsToMany(TagsModel::class, 'article_tags', 'article_id', 'tags_id');
    }
}