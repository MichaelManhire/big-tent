<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Get the user that authored the post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get all of the post's hearts.
     */
    public function hearts()
    {
        return $this->morphMany(Heart::class, 'heartable');
    }

    /**
     * Get the group that contains the post.
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
