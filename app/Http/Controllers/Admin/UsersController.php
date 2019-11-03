<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderby('name', 'asc')->get();
        return view('admin.users.index', ['users' => $users]);
    }
    
    public function changeRole(Request $request, $id)
    {
        if ($request->ajax())
        {
            $user = User::find($id);
            
            if ($user->id_role == 1)
            {
                $user->id_role = 2;
            }
            else if ($user->id_role == 2)
            {
                $user->id_role = 1;
            }
            
            $user->save();
        }
    }
}
