<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User, Artist, Customer};
use App\Mail\RegisterUser;
use Illuminate\Support\Facades\Auth;
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

    public function customerRegister()
    {
        return view('user.cusRegister');
    }

    public function artistRegister()
    {
        return view('user.artRegister');
    }

    function cusRegister(Request $request)
    {
           // Validate the request
           $this->validateRegistration($request, 'customer');

           // Retrieve validated data from the request
           $validatedData = $request->only(['fname', 'lname', 'email', 'contact', 'password']);

           // Handle file upload
           if ($request->hasFile('image_path')) {
               $imagePath = $request->file('image_path')->store('images');
               // Get the relative file path
               $imagePath = str_replace('public/', 'storage/', $imagePath);
           }

           // Prepare data for user creation
           $data = [
               'fname' => $validatedData['fname'],
               'lname' => $validatedData['lname'],
               'email' => $validatedData['email'],
               'contact' => $validatedData['contact'],
               'password' => Hash::make($validatedData['password']),
               'roles' => 'artist',
               'status' => 'active',
               'image_path' => $imagePath, // Add image path to data array
           ];

           // Create the user
           $user = User::create($data);

           // Check if user creation failed
           if (!$user) {
               return redirect(route('artregister'))->with("fail", "Registration Failed!! Please Try Again.");
           }

           // Associate the user with an artist
           $customer = new Customer(['user_id' => $user->id]);
           $customer->save();
           $user->sendEmailVerificationNotification();

           // Redirect with success message
           return redirect(route('verification.send'))->with("success", "Registration Successful!!");
       }
    function artRegister(Request $request)
    {
       // Validate the request
       $this->validateRegistration($request, 'artist');

       // Retrieve validated data from the request
       $validatedData = $request->only(['fname', 'lname', 'email', 'contact', 'password']);

       // Handle file upload
       if ($request->hasFile('image_path')) {
           $imagePath = $request->file('image_path')->store('images');
           // Get the relative file path
           $imagePath = str_replace('public/', 'storage/', $imagePath);
       }

       // Prepare data for user creation
       $data = [
           'fname' => $validatedData['fname'],
           'lname' => $validatedData['lname'],
           'email' => $validatedData['email'],
           'contact' => $validatedData['contact'],
           'password' => Hash::make($validatedData['password']),
           'roles' => 'artist',
           'status' => 'active',
           'image_path' => $imagePath, // Add image path to data array
       ];

       // Create the user
       $user = User::create($data);

       // Check if user creation failed
       if (!$user) {
           return redirect(route('artregister'))->with("fail", "Registration Failed!! Please Try Again.");
       }

       // Associate the user with an artist
       $artist = new Artist(['user_id' => $user->id]);
       $artist->save();

       // Redirect with success message
       return redirect(route('login'))->with("success", "Registration Successful!!");
   }

   private function validateRegistration(Request $request, $roles)
   {
    //    // Validate the request
    //    dd($request->all());
       $request->validate([
           'fname' => 'required',
           'lname' => 'required',
           'email' => "required|email|unique:users,email,NULL,id,roles,$roles",
           'contact' => 'required|numeric|digits:11',
           'password' => 'required|min:8|max:15|confirmed',
           'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048'
       ]);

   }
   function loginPost(Request $request)
   {
       $request->validate([
           'email' => 'required|email',
           'password' => 'required|min:8|max:15',
       ]);

       $credentials = $request->only('email', 'password');
       if (Auth::attempt($credentials)) {
           $user = Auth::user();
           $request->session()->regenerate();
           switch ($user->roles) {
               case 'artist':
                   $artist = Artist::where('user_id', $user->id)->first();
                   if ($artist) {
                       return redirect()->route('artDashboard')->with('artist_id', $user->id);
                   }
                   break;
               case 'customer':
                   $customer = Customer::where('user_id', $user->id)->first();
                   if ($customer) {
                       return redirect()->route('cusDashboard')->with('customer_id', $user->id);
                   }
                   break;
            //    case 'admin':
            //        $administrator = Artist::where('account_id', $account->id)->first();
            //        if ($administrator) {
            //            return redirect()->route('adminManagement')->with('administratorID', $administrator->id);
            //        }
            //        break;
               default:
                   return back()->withInput()->withErrors(['email' => 'Invalid user role.']);
           }
           return back()->withInput()->withErrors(['email' => 'Invalid user role.']);
       }

       return back()->withInput()->withErrors(['email' => 'Invalid email or password.']);
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
