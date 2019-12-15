<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\View;
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
        
        if (auth()->user())
        {
            $id_user = auth()->user()->id;
            $view = $post->views()->where('id_user', $id_user)->first();
            
            if (!$view)
            {
                $view = new View;
                
                $view->id_post = $id;
                $view->id_user = $id_user;
                
                $view->save();
            }
        }
        
        return view('pages.post', ['post' => $post, 'comments' => $comments]);
    }
    
    public function showCategory($id)
    {
        $category = Category::find($id);
        $posts = $category->posts()->orderby('created_at', 'desc')->paginate(5);
        return view('pages.main', ['posts' => $posts]);
    }
}