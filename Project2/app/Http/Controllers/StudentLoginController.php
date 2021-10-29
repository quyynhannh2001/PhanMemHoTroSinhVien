<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    public function showLoginForm() {
        return view('student.login');
    }
    public function login(Request $request){
        $request->validate([
            'msv'=> 'required',
            'password'=>'required'
        ],[
            'msv.required' => 'Mã sinh viên không được để trống.',
            'password.required' => 'Mật khẩu không được để trống.'
        ]);
        // dd($request->all());
        $student = [
            $this->username() => $request->msv,
            'password' => $request->password
        ];
        // dd(Auth::guard('student')->attempt($student));
        if(Auth::guard('student')->attempt($student)){
            return redirect()->intended('student/rstudent');
            // return "Thafnh cong";
        }
        else{
            return redirect()->route('student.login')->with('fail','Email hoặc mật khẩu không chính xác.');
        }
    }

    public function username() {
        return 'id';
    }

    public function logout() {
        Auth::guard('student')->logout();
        return redirect(route('student.login'));
    }
}
