<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    function loginPage(){
        return view('admin.login');
    }
    function adminDashboard(){
        return view('admin.dashboard');
    }
    function adminSetting(){
        return view('admin.setting');
    }

    function login(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' =>$request->password,

        ];

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login');
        }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }



}
