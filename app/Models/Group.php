<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Group extends Model
{
    use HasFactory;
    use HasProfilePhoto;
    use HasSlug;

    /**
     * Get the user that created the group.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
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
