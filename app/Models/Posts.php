<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public function views()
    {
        return $this->hasMany(View::class, 'id_post', 'id');
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class, 'id_post', 'id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_post', 'id');
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'posts_has_categories', 'id_post', 'id_category');
    }
}
