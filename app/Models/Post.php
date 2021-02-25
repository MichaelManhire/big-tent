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
     * Get the comments for the post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the hearts for the post.
     */
    public function hearts()
    {
        return $this->hasMany(Heart::class);
    }

    /**
     * Get the group that contains the post.
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
