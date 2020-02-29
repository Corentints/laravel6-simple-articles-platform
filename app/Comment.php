<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return readable time diff (posted at)
     * @return string
     */
    public function postedAt()
    {
        return Carbon::parse($this->created_at)->diffForHumans(null, true);
    }

    /**
     * Return readable time diff (updated at)
     * @return string
     */
    public function updatedAt()
    {
        return Carbon::parse($this->updated_at)->diffForHumans(null, true);
    }
}
