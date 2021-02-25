<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heart extends Model
{
    use HasFactory;

    /**
     * Get the post that owns the heart.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the user that sent the heart.
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
