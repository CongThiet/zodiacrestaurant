<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LoginoutController extends Controller
{
    public function __construct(){
        $this->middleware('guest',['except'=>'destroy']);
    }
    public function create(){
        return view('views.profile.login');
    }
    public function store(){
        if(!auth()->attempt(request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'Đăng nhập không thành công. Vui lòng kiểm tra lại email hoặc mật khẩu.'
            ]);
        }
        return redirect()->home()->with('noti','Đăng nhập thành công!!!');
    }
    public function destroy(){
        Session::flush();
        auth()->logout();
        return redirect()->home();        
    }
}
