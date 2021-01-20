<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        $roles=Role::all();
        return view("admin.users.users",compact('users','roles'));
    }
    public function update(Request $request, $id)
    {
        $update=User::find($id);
        $update->role_id = $request->role_id;
        $this->authorize('admin');
        $update->save();
        return redirect('/users');
    }
}
