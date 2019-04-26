<?php

use App\Models\User;
use App\Models\Posts;
use App\Models\Comment;

if (!function_exists('_user'))
{
    function _user($id_user)
    {
        $user = User::find($id_user);
        return $user;
    }
}

if (!function_exists('_post'))
{
    function _post($id_post)
    {
        $post = Posts::find($id_post);
        return $post;
    }
}


if (!function_exists('_commentsCount'))
{
    function _commentsCount($id_post)
    {
        $count = Comment::where('id_post', $id_post)->groupBy('id_post')->count();
        return $count;
    }
}