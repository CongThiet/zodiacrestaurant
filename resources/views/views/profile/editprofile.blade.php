@extends('layouts.layout')
@section('nav-custom')
    @include('layouts.nav-custom')
@endsection
@section('content')
<div class="col-md-12 box-profile" >
	<div class="container">
        <div class="row">
            <div class="box-head">
                <h4>Thông tin tài khoản</h4>
            </div>
            <div class="row show-info">
                <ul class="nav nav-tabs tab-list">
                    <li role="presentation">
                        <a href="../../profile"><strong>Thông tin cá nhân</strong></a>
                    </li>
                    <li role="presentation" class="active">
                        <a href="../../profile/edit"><strong>Chỉnh sửa thông tin</strong></a></a>
                    </li>
                    <li role="presentation">
                        <a href="../../profile/change-password"><strong>Thay đổi mật khẩu</strong></a></a>
                    </li>
                </ul>
                <div class="tab-pane container">
                    <form class="form-horizontal update-info" role="form" action ='../../profile/update/{{Auth::user()->id}}' method ='POST' accept-charset='utf-8' enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                            <div class="form-group">
                            @if( Auth::user()->image_avatar == null )
                                <img class="profile-user-img-update img-responsive img-circle" src="../../admin/images/images-avatar/avatar-null.png" alt="User profile picture" style="width: 220px; height: 229px;" id="image">
                            @else
                                <img class="profile-user-img-update img-responsive img-circle" src="../../admin/images/images-avatar/{{Auth::user()->image_avatar}}" style="width: 220px; height: 229px;" alt="User profile picture" id="image">
                            @endif
                                <label class="control-label col-sm-2" for="file">Ảnh đại diện:</label>
                                <div class="col-sm-4">
                                        <div class="browsefile" title="Thay đổi Avater">Thay đổi
                                            <input  id="file" type="file" name="image_avatar" accept="image/jpg, image/jpeg, image/png" onchange="readURL(this);" value="../../admin/images/images-avatar/{{Auth::user()->image_avatar}}" >
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="lastName">Tên:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="lastName" name='lastName' value="{{Auth::user()->lastName}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">* Họ và Tên:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="name" name='name' value="{{Auth::user()->name}}" >
                                </div>
                                @if($errors->has('name'))
                                        <label class="col-sm-4 errors-info ">
                                            <strong>{{$errors->first('name')}}</strong>
                                        </label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="address">* Địa chỉ:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="address" name="address" value="{{Auth::user()->address}}" >
                                </div>
                                @if($errors->has('address'))
                                        <label class="col-sm-4 errors-info ">
                                            <strong>{{$errors->first('address')}}</strong>
                                        </label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="birthday">Ngày sinh:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="birthday" name="birthday" placeholder="dd/mm/yyyy" value="{{Auth::user()->birthday}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="phone">* Số điện thoại:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="phone" name="phone" value="{{Auth::user()->phone}}" >
                                </div>
                                @if($errors->has('phone'))
                                        <label class="col-sm-4 errors-info ">
                                            <strong>{{$errors->first('phone')}}</strong>
                                        </label>
                                @endif
                            </div>
                            <div class="form-group" id="gender">
                                <label class="control-label col-sm-2" for="gender">Giới tính:</label>
                                <input id="male" type="radio" class="input-radio" name="gender" value="Nam"  style="width: 5%"><span>Nam</span>
                                <input id="female" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%" ><span>Nữ</span>
                               
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">* Email:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="email" name="email" value="{{Auth::user()->email}}" disabled="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="other_email">Email khác:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="other_email" name="other_email" value="{{Auth::user()->other_email}}" placeholder="zodiacrestaurant@example.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="facebook">Facebook:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="facebook" name="facebook" value="{{Auth::user()->facebook}}" placeholder="VD: facebook.com/zodiacrestaurant" >
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" value="upload" style="margin-left: 43%;">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection