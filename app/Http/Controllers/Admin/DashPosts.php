<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DashPosts extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $post -> description = $request->description;
            $post->content = $request->content;
            $post->image = $path;

            $post->save();

            return redirect()->route('post.show', $post->id);
        }
        catch (ValidationException $err)
        {
            
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        
        return view('admin.posts.edit') -> withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            
            return redirect()->route('post.show', $post->id);
        }
        catch (ValidationException $err)
        {
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        
        Storage::disk('public')->delete($post->image);
        $post->delete();
        
        return redirect()->route('main');
    }
}
