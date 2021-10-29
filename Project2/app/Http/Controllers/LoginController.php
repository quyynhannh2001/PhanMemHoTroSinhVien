<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLogin() {
        return view('admin.login');
    }
    function Login(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=>'required'
        ],[
            'email.required' => 'Email không được để trống.',
            'password.required' =>'Mật khẩu không được để trống.',
        ]);
        // dd($request->all());
        $user = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // dd(Auth::guard('admin')->attempt($user));
        if(Auth::guard('admin')->attempt($user)){
            return redirect()->intended('admin/request');
            // return "Thafnh cong";
        }
        else{
            return redirect()->route('admin.login')->with('fail','Email hoặc mật khẩu không chính xác.');
        }
    }
    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
