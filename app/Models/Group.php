<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\HasProfilePhoto;

class Group extends Model
{
    use HasFactory;
    use HasProfilePhoto;

    /**
     * Get the user that created the group.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The users that belong to the group.
     */
    public function members()
    {
        return $this->belongsToMany(User::class, 'group_user');
    }

    /**
     * Get the posts for the group.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
