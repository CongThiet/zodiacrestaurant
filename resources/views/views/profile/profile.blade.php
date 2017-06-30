@extends('layouts.layout')
@section('nav-custom')
    @include('layouts.nav-custom')
@endsection
@section('content')
<div class="col-md-12 box-profile" >
    <div class="container relative">
    @if(session('updated'))
        <div class="alert alert-success notification">
            <strong>{{session('updated')}}</strong>
        </div>
    @endif
        <div class="row">
            <div class="box-head">
                <h4>Thông tin tài khoản</h4>
            </div>
            <div class="row show-info">
                <ul class="nav nav-tabs tab-list" role="tablist" >
                    <li role="presentation" class="active">
                        <a href="../../profile"><strong>Thông tin cá nhân</strong></a>
                    </li>
                    <li role="presentation">
                        <a href="../../profile/edit"><strong>Chỉnh sửa thông tin</strong></a></a>
                    </li>
                    <li role="presentation">
                        <a href="../../profile/change-password"><strong>Thay đổi mật khẩu</strong></a></a>
                    </li>
                </ul>
                    <div class="profile col-md-6">
                    @if( Auth::user()->image_avatar == 0 )
                        <img class="profile-user-img img-responsive img-circle" src="../../admin/images/images-avatar/avatar-null.png" alt="User profile picture" style="width: 220px; height: 229px;">
                    @else
                        <img class="profile-user-img img-responsive img-circle" src="../../admin/images/images-avatar/{{Auth::user()->image_avatar}}" alt="User profile picture" style="width: 220px; height: 229px;">
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
</div>
@endsection