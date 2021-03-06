@extends('layouts.master')
@section('nav')
    @include('layouts.nav')
@endsection
@section('content')
<div class="col-md-12 box-page" >
	<div class="container">
        <div class="box-head">
            <h4>Thông tin tài khoản</h4>
        </div>
        <div class="row show-info">
            <ul class="nav nav-tabs tab-list">
                <li role="presentation">
                    <a href="{{route('profile')}}"><strong style="color: #2d2525;">Thông tin cá nhân</strong></a>
                </li>
                <li role="presentation" class="select-info">
                    <a href="{{route('profile-edit')}}"><strong style="color: #2d2525;">Chỉnh sửa thông tin</strong></a>
                </li>
                <li role="presentation">
                    <a href="{{route('profile-change-password')}}" ><strong style="color: #2d2525;">Thay đổi mật khẩu</strong></a>
                </li>
            </ul>
            <div class="tab-pane container profile col-md-8">
                <form class="form-horizontal update-info " role="form" action ="{{route('profile-update',['user'=>Auth::user()->id])}}" method ='POST' accept-charset='utf-8' enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                        <div class="form-group">
                     
                        @if( Auth::user()->image_avatar == null )
                            <img class="profile-user-img-update img-responsive img-circle" src="{{asset('/admin/images/images-avatar/avatar-null.png')}}" alt="User profile picture" style="width: 220px; height: 229px;" id="image">
                        @else
                            <img class="profile-user-img-update img-responsive img-circle" src="{{asset('/admin/images/images-avatar')}}/{{Auth::user()->image_avatar}}" style="width: 220px; height: 229px;" alt="User profile picture" id="image">
                        @endif
                            <label class="control-label col-sm-4" for="file">Ảnh đại diện:</label>
                            <div class="col-sm-4">
                                    <div class="browsefile" title="Thay đổi Avater">Thay đổi
                                        <input  id="file" type="file" name="image_avatar" accept="image/jpg, image/jpeg, image/png" onchange="readURL(this);" value="{{asset('/admin/images/images-avatar')}}/{{Auth::user()->image_avatar}}" >
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="lastName">Tên:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " id="lastName" name='lastName' value="{{Auth::user()->lastName}}" >
                            </div>
                            @if($errors->has('lastName'))
                                    <label class="errors-info ">
                                        <strong>{{$errors->first('lastName')}}</strong>
                                    </label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="name">* Họ và Tên:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " id="name" name='name' value="{{Auth::user()->name}}" >
                            </div>
                            @if($errors->has('name'))
                                    <label class="errors-info ">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="address">* Địa chỉ:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " id="address" name="address" value="{{Auth::user()->address}}" >
                            </div>
                            @if($errors->has('address'))
                                    <label class=" errors-info ">
                                        <strong>{{$errors->first('address')}}</strong>
                                    </label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="birthday">Ngày sinh:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " id="birthday" name="birthday" placeholder="dd/mm/yyyy" value="{{Auth::user()->birthday}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="phone">* Số điện thoại:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " id="phone" name="phone" value="{{Auth::user()->phone}}" >
                            </div>
                            @if($errors->has('phone'))
                                <label class=" errors-info ">
                                    <strong>{{$errors->first('phone')}}</strong>
                                </label>
                            @endif
                        </div>
                        <div class="form-group" id="gender">
                            <label class="control-label col-sm-4" for="gender">Giới tính:</label>
                            @php
                                $selectMale = Auth::user()->gender == "Nam" ? "checked" : null;
                                $selectFemale = Auth::user()->gender == "Nữ" ? "checked" : null;
                            @endphp
                            <input id="male" type="radio" class="input-radio" name="gender" {{$selectMale}} value="Nam"  style="width: 10%"><span>Nam</span>
                            <input id="female" type="radio" class="input-radio" name="gender" {{$selectFemale}} value="Nữ" style="width: 10%"><span>Nữ</span> 
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">* Email:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " id="email" name="email" value="{{Auth::user()->email}}" disabled="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="other_email">Email khác:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " id="other_email" name="other_email" value="{{Auth::user()->other_email}}" placeholder="zodiacrestaurant@example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="facebook">Facebook:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " id="facebook" name="facebook" value="{{Auth::user()->facebook}}" placeholder="VD: facebook.com/zodiacrestaurant" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="upload" style="margin-left: 43%;">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(220)
                    .height(229);
            };

            reader.readAsDataURL(input.files[0]);
        };
    };
</script>
@endsection