<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function path()
    {
        return '/categories/' . $this->name;
    }

    public function articles()
    {

    }
}
