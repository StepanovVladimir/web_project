<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\View;

class ViewsController extends Controller
{
    public function show()
    {
        $views = auth()->user()->views;
        return view('pages.views', ['views' => $views]);
    }
}
