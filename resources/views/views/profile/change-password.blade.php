@extends('layouts.layout')
@section('nav-custom')
    @include('layouts.nav-custom')
@endsection
@section('content')
<div class="col-sm-12 box-profile">
	<div class="container">
        <div class="row">
            <div class="box-head">
                <h4>Thông tin tài khoản</h4>
            </div>
            <div class="row show-info">
                <ul class="nav nav-tabs tab-list" >
                    <li role="presentation">
                        <a href="../../profile"><strong>Thông tin cá nhân</strong></a>
                    </li>
                    <li role="presentation">
                        <a href="../../profile/edit"><strong>Chỉnh sửa thông tin</strong></a>
                    </li>
                    <li role="presentation" class="active">
                        <a href="../../profile/change-password" ><strong>Thay đổi mật khẩu</strong></a>
                    </li>
                </ul>
                    <div class="tab-pane container">
                        <form class="form-horizontal change-password" role="form" action ='../../profile/update-password/{{Auth::user()->id}}' method ='POST' accept-charset='utf-8'>
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="password">Mật khẩu cũ:</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control " id="password" name='password' value="" placeholder="nhập mật khẩu cũ" required>
                                </div>
                                @if(session('message'))
                                    <label class="col-sm-4 errors-password ">
                                        <strong>{{session('message')}}</strong>
                                    </label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="new_password">Mật khẩu mới:</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control " id="new_password" name="new_password" value="" placeholder="nhập mật khẩu mới" required>
                                </div>
                                @if($errors->has('new_password'))
                                        <label class="col-sm-4 errors-password ">
                                            <strong>{{$errors->first('new_password')}}</strong>
                                        </label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="new_password_confirmation">Nhập lại mật khẩu mới:</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control " id="new_password_confirmation" name="new_password_confirmation" placeholder="nhập lại mật khẩu mới" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-left: 43%;">Lưu</button>
                        </form>  
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection