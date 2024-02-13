<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email_address' => 'required'
        ]);

        $new_user = new User();
        $new_user->name = strip_tags($request->fullname);
        $new_user->email = strip_tags($request->email_address);
        $new_user->role = strip_tags($request->role);
        $new_user->password = Hash::make($request->email_address);
        $new_user->save();

        return back()->with('success', 'The user was added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'fullname' => 'required',
            'email_address' => 'required'
        ]);

        $update_user = User::findOrFail($user->id);
        $update_user->name = strip_tags($request->fullname);
        $update_user->email = strip_tags($request->email_address);
        $update_user->role = strip_tags($request->role);
        $update_user->password = Hash::make($request->email_address);
        $update_user->save();

        return redirect()->route('users.index')->with('success', 'The user has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
