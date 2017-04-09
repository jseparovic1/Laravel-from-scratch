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
     * Returns user that published post
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $body comment body
     */
    public function addComment($body)
    {
        //this line also add post_id in comments db table
        $this->comments()->create([
            'body' => $body,
            'user_id' => auth()->user()->id
        ]);
    }
}
