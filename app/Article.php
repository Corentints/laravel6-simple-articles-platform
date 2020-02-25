<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return the article path
     */
    public function path()
    {
        return '/articles/' . $this->id;
    }
}
