<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function viewInforUser(){
        return view('views.profile.profile');
    }
    public function edit(){
        return view('views.profile.editprofile');  
    }
    public function update(Request $request, $id){
        $this->validate(request(),[
                'lastName'=>'required',
                'name'=>'required',
                'address'=>'required',
                'phone'=>'required|min:8|max:16',
                'phone'=>'numeric',
            ],
            [
                'lastName.required'=>'Vui lòng nhập tên.',
                'name.required'=>'Vui lòng nhập họ tên đầy đủ.',
                'address.required'=>'Vui lòng nhập địa chỉ.',
                'phone.required'=>'Vui lòng nhập số điện thoại.',
                'phone.numeric'=>'Số điện thoại không đúng định dạng',
                'phone.min'=>'Số điện thoại của bạn tối thiểu 8 kí tự.',
                'phone.max'=>'Số điện thoại của bạn quá dài.',
            ]);
        $user = User::find($id);
        if($request->image_avatar){
            $user->image_avatar = time().'.'.$request->image_avatar->getClientOriginalExtension();
            $request->image_avatar->move('admin/images/images-avatar', $user->image_avatar);
            // $request->image_avatar->move(public_path('admin/images/images-avatar'), $user->image_avatar);
        }
        $user->lastName = $request->lastName;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->other_email = $request->other_email;
        $user->facebook = $request->facebook;
        $user->save();
        // $user->update($request->all();
        return redirect(route('profile'))->with('updated','Thông tin của bạn đã được cập nhật.');
    }
    public function changePassword(){
        return view('views.profile.change-password');  
    }
    public function changePasswordUpdate(Request $request, $id){
        if(!auth()->attempt(request(['password']))){
            return back()->with('message','Mật khẩu của bạn không đúng.');
        }
        $this->validate(request(),[
                'new_password'=>'required|min:6|max:20|confirmed'
            ],
            [
                'new_password.required'=>'Vui lòng nhập mật khẩu mới',
                'new_password.min'=>'Mật khẩu của bạn tối thiểu 6 kí tự.',
                'new_password.max'=>'Mật khẩu của bạn tối đa 20 kí tự.',
                'new_password.confirmed'=>'Xác nhận mật khẩu không đúng.'
            ]);
        if($request->password == $request->new_password){
            return back()->with('message','Mật khẩu mới trùng khớp mật khẩu cũ.');
        }
        $user = User::find($id);
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect(route('profile'))->with('updated','Cập nhật mật khẩu thành công.');
    }
}
