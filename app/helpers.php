<?php

use App\Models\User;
use App\Models\Posts;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

function getCategories()
{
    return Category::orderby('name', 'asc')->get();
}

function canDeleteComments()
{
    if (Auth::user()->role->permissions()->where('name', 'deleting_comments')->first())
    {
        return true;
    }
    else
    {
        return false;
    }
}

function canManagePosts()
{
    if (Auth::user()->role->permissions()->where('name', 'managing_posts')->first())
    {
        return true;
    }
    else
    {
        return false;
    }
}

function canManageCategories()
{
    if (Auth::user()->role->permissions()->where('name', 'managing_categories')->first())
    {
        return true;
    }
    else
    {
        return false;
    }
}

function canManageUsers()
{
    if (Auth::user()->role->permissions()->where('name', 'managing_users')->first())
    {
        return true;
    }
    else
    {
        return false;
    }
}