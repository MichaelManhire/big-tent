<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Get the user that authored the comment.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the parent commentable model (post or comment).
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the comment's hearts.
     */
    public function hearts()
    {
        return $this->morphMany(Heart::class, 'heartable');
    }

    /**
     * Get all of the comment's replies.
     */
    public function replies()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
