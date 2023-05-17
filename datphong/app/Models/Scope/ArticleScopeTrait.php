<?php

namespace App\Models\Scope;

trait ArticleScopeTrait
{
    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
}