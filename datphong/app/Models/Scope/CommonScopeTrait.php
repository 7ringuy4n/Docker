<?php

namespace App\Models\Scope;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

trait CommonScopeTrait
{
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created', 'desc');
    }

    public function scopeSortLatest($query)
    {
        return $query->orderBy('sort');
    }

    public function scopeLocale($query)
    {
        return $query->where('locale', LaravelLocalization::getCurrentLocale());
    }
}