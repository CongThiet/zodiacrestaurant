@extends('layouts.master')
@section('nav-custom')
    @include('layouts.nav-custom')
@endsection
@section('content')
<div class="col-sm-12 box-page">
	<div class="container">
        <div class="box-head">
            <h4>Thông tin tài khoản</h4>
        </div>
        <div class="row show-info">
            <ul class="nav nav-tabs tab-list" >
                <li role="presentation">
                    <a href="{{route('profile')}}"><strong style="color: #2d2525;">Thông tin cá nhân</strong></a>
                </li>
                <li role="presentation">
                    <a href="{{route('profile-edit')}}"><strong style="color: #2d2525;">Chỉnh sửa thông tin</strong></a>
                </li>
                <li role="presentation" class="select-info">
                    <a href="{{route('profile-change-password')}}" ><strong style="color: #2d2525;">Thay đổi mật khẩu</strong></a>
                </li>
            </ul>
                <div class="tab-pane container profile col-md-8">
                    <form class="form-horizontal change-password" role="form" action ="{{route('profile-update-password',['user'=>Auth::user()->id])}}" method ='POST' accept-charset='utf-8'>
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="password">Mật khẩu cũ:</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control " id="password" name='password' value="" placeholder="nhập mật khẩu cũ" required>
                            </div>
                            @if(session('message'))
                                <label class=" errors-password ">
                                    <strong>{{session('message')}}</strong>
                                </label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="new_password">Mật khẩu mới:</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control " id="new_password" name="new_password" value="" placeholder="nhập mật khẩu mới" >
                            </div>
                            @if($errors->has('new_password'))
                                    <label class="errors-password ">
                                        <strong>{{$errors->first('new_password')}}</strong>
                                    </label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="new_password_confirmation">Nhập lại mật khẩu mới:</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control " id="new_password_confirmation" name="new_password_confirmation" placeholder="nhập lại mật khẩu mới" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left: 43%;">Lưu</button>
                    </form>  
                </div>
        </div>
    </div>
</div>
@endsection