<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name"=> "required",
            "email"=> "required|email|unique:users",
            "password"=> "required|min:8",
            "password_confirmation"=> "required|same:password"
        ]);
        $user = User::create($validated);
        if (!$user) {
            return redirect()->back()->with("error",__("Error creating user"));
        }
        return redirect()->route("users.index")->with("success",__("User «:name» created successfully", ["name"=> $user->name]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            "name"=> "required",
            "email"=> "required|email|unique:users,email,".$user->id,
            "password"=> "nullable|min:8",
            "password_confirmation"=> "nullable|same:password"
        ]);
        if (empty($validated["password"])) {
            $validated["password"] = $user->password;
        }
        $user->update($validated);
        return redirect()->route("users.index")->with("success",__("User «:name» updated successfully", ["name"=> $user->name]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id == 1) {
            return redirect()->back()->with("error",__("You cannot delete the primary user"));
        }
        $user->delete();
        return redirect()->route("users.index")->with("success",__("User «:name» deleted successfully", ["name"=> $user->name]));
    }
}
