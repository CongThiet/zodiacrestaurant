<?php

namespace App\Http\Controllers;
use App\User;

// use App\Http\Requests;

class RegistrationController extends Controller
{
    public function create(){
        return view('views.profile.register');
    }
    public function store(){
        $this->validate(request(),[
                'lastName'=>'required',
                'name'=>'required',
                'address'=>'required',
                'phone'=>'required|min:8|max:16',
                'phone'=>'numeric',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6|max:20|confirmed'
            ],
            [
                'lastName.required'=>'Vui lòng điền tên',
                'name.required'=>'Vui lòng điền đầy đủ họ và tên.',
                'address.required'=>'Vui lòng điền địa chỉ',
                'phone.required'=>'Vui lòng điền số điện thoại',
                'phone.numeric'=>'Số điện thoại không đúng định dạng',
                'phone.min'=>'Số điện thoại bạn quá ngắn tối thiểu 8 số.',
                'phone.max'=>'Số điện thoại bạn quá dài.',
                'email.required'=>'Vui lòng điền địa chỉ email.',
                'email.email'=>'Địa chỉ email không đúng định dạng.',
                'email.unique'=>'Địa chỉ email của bạn đã được sử dụng',
                'password.required'=>'Bạn chưa điền password.',
                'password.min'=>'Mật khẩu của bạn tối thiểu 6 kí tự.',
                'password.max'=>'Mật khẩu của bạn tối đa 20 kí tự.',
                'password.confirmed'=>'Xác nhận mật khẩu không đúng.'
            ]);
        $user = User::create([
            'lastName'=>request('lastName'),
            'name'=>request('name'),
            'address' =>request('address'),
            'phone'=>request('phone'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password'))
        ]);
        auth()->login($user);
        return redirect()->home()->with('noti','Chào mừng đến cửa hàng Zodiac.');
    }
}
