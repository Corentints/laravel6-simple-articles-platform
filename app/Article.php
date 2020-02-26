<?php

namespace App;

use Carbon\Carbon;
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
        return '/articles/' . $this->slug;
    }


    /**
     * Return published_at readable for humans
     * Timezone is based on config/app.php
     */
    public function published_at()
    {
        return Carbon::parse($this->published_at)->diffForHumans(null, true);
    }
}
