<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comment;
use App\Models\Category;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::orderby('created_at', 'desc')->paginate(5);
        return view('pages.main', ['posts' => $posts]);
    }
    
    public function show($id)
    {
        $post = Posts::find($id);
        $comments = $post->comments;
        return view('pages.post', ['post' => $post, 'comments' => $comments]);
    }
    
    public function showCategory($id)
    {
        $category = Category::find($id);
        $posts = $category->posts()->orderby('created_at', 'desc')->paginate(5);
        return view('pages.main', ['posts' => $posts]);
    }
}