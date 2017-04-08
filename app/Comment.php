<?php

namespace App;

class Comment extends Model
{
    /**
     * Get the post that is associated with comment
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
