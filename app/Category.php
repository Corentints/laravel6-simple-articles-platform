<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path()
    {
        return '/categories/' . $this->slug;
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
