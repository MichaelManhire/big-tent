<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heart extends Model
{
    use HasFactory;

    /**
     * Get the parent heartable model (post or comment).
     */
    public function heartable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user that sent the heart.
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
