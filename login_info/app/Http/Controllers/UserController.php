<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class UserController extends Controller
{
    public function destroy($id)
    {
        $user = Auth::user();
        
        if ($user && $user->id == $id) {
            $user->delete();
            Auth::logout();
            return redirect()->route('login')->with('status', 'Your account has been deleted.');
        }

        
        return redirect()->back()->withErrors('Unable to delete account.');
    }

    // Method to show the edit form
    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view('edit', compact('user')); 
    }

    // Method to update the user information
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed', 
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password')); 
        }

        $user->save();

        return redirect()->route('user.edit', $user->id)->with('success', 'User information updated successfully.');
    }
}
