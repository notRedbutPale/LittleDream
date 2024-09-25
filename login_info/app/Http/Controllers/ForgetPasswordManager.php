<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ForgetPasswordManager extends Controller
{
    public function forgetPassword()
    {
        return view('forget-password'); // Ensure this view exists
    }

    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;

        // Check if the email exists in the database
        $userExists = User::where('email', $email)->exists();

        if (!$userExists) {
            return back()->withErrors(['email' => 'Email is not registered. Please register.']);
        }

        $token = Str::random(64);

        // Update or Insert the token into the database
        $existingToken = DB::table('password_reset_tokens')->where('email', $email)->first();

        if ($existingToken) {
            DB::table('password_reset_tokens')->where('email', $email)->update([
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        } else {
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        }

        // Send the email with the reset link
        Mail::send('emails.forget-password', ['token' => $token], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('success', 'We have sent you a password reset link!');
    }

    public function resetPassword($token)
    {
        return view('reset-password', ['token' => $token]); // Ensure this view exists
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => [
                'required',
                'confirmed',
                'min:5', // Minimum 5 characters
                'regex:/[!@#$%^&*(),.?":{}|<>]/' // At least one special character
            ],
            'token' => 'required',
        ], [
            // Custom error messages
            'password.min' => 'The password must be at least 5 characters long.',
            'password.regex' => 'The password must contain at least one special character.',
        ]);
        $record = DB::table('password_reset_tokens')->where('token', $request->token)->first();

        if (!$record || $record->email !== $request->email || Carbon::parse($record->created_at)->addHours(2)->isPast()) {
            return back()->withErrors(['token' => 'This password reset token is invalid or has expired.']);
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        DB::table('password_reset_tokens')->where('token', $request->token)->delete();

        return redirect()->route('login')->with('success', 'Your password has been reset successfully!');
    }
}