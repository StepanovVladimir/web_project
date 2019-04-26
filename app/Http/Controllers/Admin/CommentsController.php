<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function show()
    {
        $comments = Comment::orderby('created_at', 'desc')->paginate(4);
        return view('admin.comments.show', ['comments' => $comments]);
    }
}
