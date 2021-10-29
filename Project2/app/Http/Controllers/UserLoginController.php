<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function LoginForm() {
        return view('userr.login');
    }
    function login(Request $request){
        $request->validate([
            'msp'=> 'required',
            'password'=>'required'
        ],[
            'msp.required' => 'Mã hỗ trợ viên không được để trống.',
            'password.required' => 'Mật khẩu không được để trống.',
        ]);
      
        $support = [
            $this->username() => $request->msp,
            'password' => $request->password
        ];
        // dd($user);
        // dd($support);
        // dd(Auth::guard('admin')->attempt($user));
        if(Auth::guard('support')->attempt($support)){
            
            return redirect()->intended('support/ruser');
            // return redirect('support/ruser');
            // return "Thafnh cong";
        }
        else{
            return redirect()->route('support.login')->with('fail','Email hoặc mật khẩu không chính xác.');
            // return redirect('support/login')->with('fail','Email hoặc mật khẩu không chính xác.');
        }
    }

    public function username() {
        return 'id';
    }
    public function logout() {
        Auth::guard('support')->logout();
        return redirect(route('support.login'));
    }
}
