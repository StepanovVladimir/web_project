<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_post', 'id');
    }
}
