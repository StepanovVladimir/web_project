<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Validation\ValidationException;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderby('name', 'asc')->get();
        return view('admin.categories.index', ['categories' => $categories]);
    }
    
    public function create()
    {
        return view('admin.categories.create');
    }
    
    public function store(Request $request)
    {
        try
        {
            $this->validate($request, [
                'name' => 'required',
            ]);
            
            $category = new Category();
            $category->name = $request->name;
            $category->save();

            return redirect()->route('categories.index');
        }
        catch (ValidationException $err)
        {
            return back()->with('error', 'Вы не заполнили название катерогии');
        }
    }
    
    public function edit($id)
    {
        $category = Category::find($id);
        
        return view('admin.categories.edit', ['category' => $category]);
    }
    
    public function update(Request $request, $id)
    {
        try
        {
            $this->validate($request, [
                'name' => 'required',
            ]);
            
            $category = Category::find($id);

            $category->name = $request->name;

            $category->save();

            return redirect()->route('categories.index');
        }
        catch (ValidationException $err)
        {
            return back()->with('error', 'Вы не заполнили название катерогии');
        }
    }
    
    public function destroy(Request $request)
    {
        if ($request->ajax())
        {
            $id = (int)$request->input('id');
            $category = Category::find($id);
            $category->posts()->detach();
            $category->delete();
        }
    }
}
