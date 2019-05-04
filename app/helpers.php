<?php

use App\Models\User;
use App\Models\Posts;
use App\Models\Comment;
use App\Models\Category;

function categories()
{
    return Category::orderby('name', 'asc')->get();
}