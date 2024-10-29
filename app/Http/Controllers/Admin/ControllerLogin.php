<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ControllerLogin extends Controller
{
    public function login(Request $request){
        $required = [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];

        $message =[
            'email.required' => 'Vui lòng nhập email',
            'email' => 'email phải đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password' => 'password phải tối thiểu 6 kí tự',
        ];

        $validation = Validator::make($request->all(), $required, $message);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }


        if(Auth::attempt(['email'=> $request->email , 'password' => $request->password])){
            return redirect()->route('thietbi');
        }else{
            return redirect()->back()->with('error', 'Mật khẩu hoặc email không đúng');
        }
    }

    public function register(Request $request){
        $required = [
            'name_register' => 'required|string|min:2',
            'email_register' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ];

        $message =[
            'name_register.required' => 'Vui lòng nhập Name',
            'name_register' => 'Name tối phải tối thiểu 2 kí tự',
            'email_register.required' => 'Vui lòng nhập email',
            'email_register' => 'email phải đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password' => 'password phải tối thiểu 6 kí tự',
            'confirmed'=>'Mật khẩu không khớp'
        ];

        $validation = Validator::make($request->all(), $required, $message);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }

        User::create([
            'name' => $request->name_register,
            'email' => $request->email_register,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.login');
    }

    public function logout(){
            Auth::logout();
            return redirect()->route('admin.login');
    }
}
