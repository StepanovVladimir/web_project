<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comment;

class MainController extends Controller
{
    public function index()
    {
        $posts = Posts::orderby('created_at', 'desc')->paginate(4);
        
        return view('pages.main')->withPosts($posts);
    }
    
    public function show($id)
    {
        $post = Posts::find($id);
        $comments = $post->comments;
        return view('pages.post', ['post' => $post, 'comments' => $comments]);
    }
}