<?php

namespace App;

use Carbon\Carbon;

/**
 * App\Post
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
class Post extends Model
{
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

    /**
     * Scope a query to only include posts in selected month users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query , $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }

        return $query;
    }

    public static function archives()
    {
        return static::selectRaw(
            'monthname(created_at) as month,
	         year(created_at) as year,
	         count(*) as published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get();
    }
}
