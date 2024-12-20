<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $this->authorize("manageUser",User::class);
        $users=User::all();
        return view("users.index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("manageUser",User::class);
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("manageUser",User::class);
        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
            "is_admin"=>$request->is_admin
        ]);
        return redirect()->route("users.index");
    }


    public function edit(User $user)
    {
        $this->authorize("manageUser",User::class);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize("manageUser",User::class);
        $user->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
            "is_admin"=>$request->is_admin
        ]);
 
        return redirect()->route('users.index'); 
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize("manageUser",User::class);
        $user->delete();
        return redirect()->route('users.index');
    }
}
