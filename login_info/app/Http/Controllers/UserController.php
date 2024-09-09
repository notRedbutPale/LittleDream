<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Method to delete the user
    public function destroy($id)
    {
        $user = Auth::user();
        
        if ($user && $user->id == $id) {
            $user->delete();

            // Logout the user after deletion
            Auth::logout();

            // Redirect to login page with a status message
            return redirect()->route('login')->with('status', 'Your account has been deleted.');
        }

        // If deletion fails, redirect back with an error message
        return redirect()->back()->withErrors('Unable to delete account.');
    }
}
