<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Posts::class, 'posts_has_categories', 'id_category', 'id_post');
    }
}
