<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Posts;
use App\Models\Category;
use Illuminate\Validation\ValidationException;

class PostsController extends Controller
{
    public function create()
    {
        $categories = Category::orderby('name', 'asc')->get();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        try
        {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'content' => 'required',
                'image' => 'required'
            ]);
            
            $path = $request->file('image')->store('uploads', 'public');
            
            $post = new Posts();

            $post->title = $request->title;
            $post->description = $request->description;
            $post->content = $request->content;
            $post->image = $path;

            $post->save();
            
            $post->categories()->attach($request->input('categories'));

            return redirect()->route('post.show', $post->id);
        }
        catch (ValidationException $err)
        {
            return back()->with('error', 'Вы не заполнили все поля');
        }
    }

    public function edit($id)
    {
        $post = Posts::find($id);
        $categories = Category::orderby('name', 'asc')->get();

        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        try
        {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'content' => 'required'
            ]);
            
            $post = Posts::find($id);
            
            if ($request->hasFile('image'))
            {
                Storage::disk('public')->delete($post->image);
                $path = $request->file('image')->store('uploads', 'public');
                $post->image = $path;
            }
            
            $post->title = $request->title;
            $post->description = $request->description;
            $post->content = $request->content;
            
            $post->save();
            
            $post->categories()->detach();
            $post->categories()->attach($request->input('categories'));
            
            return redirect()->route('post.show', $post->id);
        }
        catch (ValidationException $err)
        {
            return back()->with('error', 'Вы не заполнили все поля');
        }
    }

    public function destroy($id)
    {
        $post = Posts::find($id);
        
        Storage::disk('public')->delete($post->image);
        $post->comments()->delete();
        $post->categories()->detach();
        $post->delete();
        
        return redirect()->route('main');
    }
}
