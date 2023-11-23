<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use App\Mail\UserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function index(){
        return view('home');
    }
    function dashboard(){
        return view('dashboard');
    }
    function loginPage(){
        return view('login');
    }
    function login(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' =>$request->password,
            'status' => 'Active',
        ];

        if(Auth::attempt($credentials)){
            $user = Auth::user(); // Get the authenticated user

            if($user->role == 1){ // Assuming '1' represents the admin role
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        } else {
            return redirect()->route('login');
        }
    }
    function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
    function registrationPage(){
        return view('registration');
    }
    function registration(Request $request){
        $token = hash('sha256', time());

        $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password =Hash::make($request->password) ;
         $user->status = 'Pending';
         $user->token = $token;
         $user->role = 2;
         $user->save();

         $verification_link = url('registration/verification/'.$token.'/'.$request->email);
         $message = 'Please click on this link: <br><a href="'.$verification_link.'">Click here</a>';
         Mail::to($request->email)->send(new UserMail($message));
        echo 'Email is send';
    }
    function registrationVerify($token, $email){
        $user = User::where('token', $token)->where('email', $email)->first();
        if(!$user){
            return redirect('login');
        }
        $user->status = 'Active';
        $user->token = '';
        $user->update();
        echo 'Registration verification is  successful';
    }
    function forgetPasswordPage(){
        return view('forget_password');
    }
    function forgetPassword(Request $request){
        $token = hash('sha256', time());
        $user = User::where('email', $request->email)->first(); // Use your User model instead of Auth
        if(!$user){
            echo('Email not found');
        }
        $user->token = $token;
        $user->save(); // Use the save() method to update the user
        $reset_link = url('reset-password/'.$token.'/'.$request->email);

        $message = 'Please click on this link: <br><a href="'.$reset_link.'">Click here</a>';
        Mail::to($request->email)->send(new ResetPasswordMail($message));
    }

    function resetPasswordMethod($token,$email){
        // echo $token;
        $user = User::where('token', $token)->where('email', $email)->first();
        if(!$user){
            // dd('No user is found');
            return redirect()->route('login');
        }
        return view('reset_password',compact('token', 'email'));
    }

    function resetPasswordSubmit(Request $request){
        $user = User::where('token', $request->token)->where('email', $request->email)->first();
        $user->token= '';
        $user->password = Hash::make($request->new_password);
        $user->update();
        // echo 'Password is reset';
        return redirect()->route('login')->with('success', 'Password has been reset successfully. Please login.');
    }












}
