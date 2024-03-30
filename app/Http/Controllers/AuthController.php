<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function customerregister()
    {
        return view('user.cusRegister');
    }

    public function artistregister()
    {
        return view('user.artRegister');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'contact' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_picture' => 'nullable|image', // Add validation for profile picture
        ]);
    
        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures');
        } else {
            $path = null;
        }
    
        // Insert the new user into the database
        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles = 'customer';
        $user->image_path = $path; // Save the image path
        $user->status = 'active';
        $user->remember_token = Str::random(40);
        $user->save();
    
        // Send a confirmation email
        Mail::to($user->email)->send(new RegisterUser($user));
    
        // Redirect the user after registration
        return redirect('/login')->with('success', 'Registration successful. You can now login.');
    }

    public function verify($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user))
        {

        }
        else
        {
            abort(404);
        }
    }
}
