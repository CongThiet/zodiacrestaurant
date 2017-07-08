@extends('layouts.master')
@section('nav-custom')
    @include('layouts.nav-custom')
@endsection
@section('content')
<div class="col-md-12 box-page" >
    <div class="container relative">
    @if(session('updated'))
        <div class="alert alert-success notification">
            <strong>{{session('updated')}}</strong>
        </div>
    @endif
        <div class="box-head">
            <h4>Thông tin tài khoản</h4>
        </div>
        <div class="row show-info">
            <ul class="nav nav-tabs tab-list">
                <li role="presentation" class="select-info">
                    <a href="{{route('profile')}}"><strong style="color: #2d2525;">Thông tin cá nhân</strong></a>
                </li>
                <li role="presentation">
                    <a href="{{route('profile-edit')}}"><strong style="color: #2d2525;">Chỉnh sửa thông tin</strong></a>
                </li>
                <li role="presentation">
                    <a href="{{route('profile-change-password')}}" ><strong style="color: #2d2525;">Thay đổi mật khẩu</strong></a>
                </li>
            </ul>
                <div class="profile col-md-6 tab-pane">
                @if( Auth::user()->image_avatar == null )
                    <img class="profile-user-img-update img-responsive img-circle" src="{{asset('/admin/images/images-avatar/avatar-null.png')}}" alt="User profile picture" style="width: 220px; height: 229px;" id="image">
                @else
                    <img class="profile-user-img-update img-responsive img-circle" src="{{asset('/admin/images/images-avatar')}}/{{Auth::user()->image_avatar}}" style="width: 220px; height: 229px;" alt="User profile picture" id="image">
                @endif
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Tên:</b> <span class="pull-right">{{Auth::user()->lastName}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Họ và Tên:</b> <span class="pull-right">{{Auth::user()->name}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Địa chỉ:</b> <span class="pull-right">{{Auth::user()->address}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Ngày sinh:</b> <span class="pull-right">{{Auth::user()->birthday}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Số điện thoại:</b> <span class="pull-right">{{Auth::user()->phone}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Giới tính:</b> <span class="pull-right">{{Auth::user()->gender}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Email:</b> <span class="pull-right">{{Auth::user()->email}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Email khác:</b> <span class="pull-right">{{Auth::user()->other_email}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Facebook:</b> <span class="pull-right">{{Auth::user()->facebook}}</span>
                        </li>
                    </ul>
                </div>
        </div>
    </div>
</div>
@endsection