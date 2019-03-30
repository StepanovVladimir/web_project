<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class MainController extends Controller
{
    public function getAllPosts()
    {
        $posts = Posts::orderby('created_at', 'desc') -> paginate(4);
        
        return view('pages.main') -> withPosts($posts);
    }
    
    public function getPost($id)
    {
        $post = Posts::find($id);
        
        return view('pages.post') -> withPost($post);
    }
}