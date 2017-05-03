<?php

namespace App;

/**
 * App\Comment
 *
 * @property-read \App\User $author
 * @property-read \App\Post $post
 * @mixin \Eloquent
 */
class Comment extends Model
{
    /**
     * Get the post that is associated with comment
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
