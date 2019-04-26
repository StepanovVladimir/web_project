<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $content = $request->input('content');
        $id_post = (int)$request->input('id_post');
        $id_user = auth()->user()->id;
        
        $comment = new Comment();
        
        $comment->id_post = $id_post;
        $comment->id_user = $id_user;
        $comment->comment = $content;
        
        $comment->save();
        
        return back();
    }
    
    public function show()
    {
        $comments = auth()->user()->comments;
        return view('pages.comments', ['comments' => $comments]);
    }
    
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back();
    }
}
