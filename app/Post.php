<?php

namespace App;

class Post extends Model
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get all comments assiated with post
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
