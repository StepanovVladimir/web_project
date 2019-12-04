<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Posts;

class LikesController extends Controller
{
    public function put(Request $request)
    {
        if ($request->ajax())
        {
            $id_post = (int)$request->input('id_post');
            $post = Posts::find($id_post);

            $id_user = auth()->user()->id;
            $like = $post->likes()->where('id_user', $id_user)->first();

            if ($like)
            {
                $like->delete();
            }
            else
            {
                $like = new Like();

                $like->id_post = $id_post;
                $like->id_user = $id_user;

                $like->save();
            }
        }
        
    }
}
