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
     * Get all comments for given post
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Add new comment for given post
     * @param $body comment body
     */
    public function addComment($body)
    {
        //this line also populate post_id in comment db table
        $this->comments()->create(['body' => $body ]);
    }
}
