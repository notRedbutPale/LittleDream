<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; 

class AuthManager extends Controller
{
    public function login()
    {
        return view('login'); // Returns the login view
    }

    public function register()
    {
        return view('register'); // Returns the registration view
    }
    public function loginPost(Request $request){
      $request->validate([
         'email' =>'required|email',
         'password' =>'required|min:5'
      ]);
      $credentials=$request->only('email', 'password');
      if(Auth::attempt($credentials)){
         return redirect()->intended(route('profile'));
      
      }
      return redirect(route('login'))->with("error","Login details are invalid");

    }
    public function registerPost(Request $request){
      #dd($request->all());
      $request->validate([
         'username'=>'required',
         'email' => 'required|email|unique:users',
         'password' => [
            'required',
            'min:5',
            'regex:/[!@#$%^&*(),.?":{}|<>]/'
         ],
      ], [
         'email.unique' => 'SORRY THIS EMAIL IS ALREADY IN USE', // Custom error message
         'password.min' => 'Password must be at least 5 characters long', // Custom password length error message
         'password.regex' => 'Password must include at least one special character' // Custom error for special character
      ]);


      $data['name']= $request->username;
      $data['email']= $request->email;
      $data['password'] = Hash::make($request->password); 
      $user=User::create($data);
      if(!$user){
         return redirect(route('register'))->with("error","Registration failed.Try Again :)");
      }
      return redirect(route('login'))->with("Success","Reistration Successful. Login to access.");
    }
    public function logout()
    {
        // Flush all session data
        Session::flush();
    
        // Log out the user
        Auth::logout();
    
        // Redirect to login page with a success message
        return redirect()->route('homepage')
                         ->with('success', 'You have been logged out.');
    }
    
}
