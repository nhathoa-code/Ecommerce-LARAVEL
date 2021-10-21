<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view("admin.user.index", ["users" => User::all()]);
    }


    public function create()
    {
        return view("admin.user.add");
    }


    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "bail|required|email|unique:users,email",
            "password" => "bail|required|confirmed",
            "role" => "required"
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status = 1;
        $user->save();
        return redirect('admin/user')->with('message', 'User added successfully!');
    }

    public function show(User $user)
    {
    }

    public function edit(User $user)
    {
        return view("admin.user.edit", ["user" => $user]);
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            "name" => "required",
            "email" => ["bail", "required", "email", Rule::unique('users')->ignore($user)],
            "password" => "bail|required|confirmed",
            "role" => "required"
        ]);
        if ($request->status) {
            $status = '1';
        } else {
            $status = '0';
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->status = $status;
        $user->save();
        return redirect('admin/user')->with('message', 'User edited successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin/user')->with('message', 'User deleted successfully!');
    }
}
