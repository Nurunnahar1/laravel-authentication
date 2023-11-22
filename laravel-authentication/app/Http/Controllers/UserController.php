<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function index(){
        return view('home');
    }
    function loginPage(){
        return view('login');
    }
    function registrationPage(){
        return view('registration');
    }
    function forgetPassword(){
        return view('forget_password');
    }
    function registration(Request $request){
        $token = hash('sha256', time());

        $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password =Hash::make($request->password) ;
         $user->status = 'Pending';
         $user->token = $token;
         $user->save();

         $verification_link = url('registration/verification/'.$token.'/'.$request->email);
         $message = 'Please click on this link: <br><a href="'.$verification_link.'">Click here</a>';
         Mail::to($request->email)->send(new UserMail($message));
        echo 'Email is send';
    }


    function registrationVerify(){

    }
}
