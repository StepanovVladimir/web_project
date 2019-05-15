<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Validation\ValidationException;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        try
        {
            $this->validate($request, [
                'content' => 'required',
            ]);
            
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
        catch (ValidationException $err)
        {
            return back()->with('error', 'Вы не написали комментарий');
        }
    }
    
    public function show()
    {
        $comments = auth()->user()->comments;
        return view('pages.comments', ['comments' => $comments]);
    }
    
    public function destroy(Request $request)
    {
        if ($request->ajax())
        {
            $id = (int)$request->input('id');
            $comment = Comment::find($id);
            $comment->delete();
        }
    }
}
