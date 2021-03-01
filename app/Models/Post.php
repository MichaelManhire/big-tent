<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\HasProfilePhoto;

class Post extends Model
{
    use HasFactory;
    use HasProfilePhoto;

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
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl()
    {
        return $this->author->profile_photo_url;
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
