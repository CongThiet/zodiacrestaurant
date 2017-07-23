@extends('layouts.master')
@section('nav')
    @extends('layouts.nav')
    @section('navbar')
        <ul class="nav navbar-nav">
            <li class="hidden">
                <a href="#page-top"></a>
            </li>
            <li>
                <a class="page-scroll" href="{{route('home')}}/#1"><strong>Giới thiệu</strong></a>
            </li>
            <li>
                <a class="page-scroll" href="{{route('home')}}/#menu"><strong>Thực đơn</strong></a>
            </li>
            <li>
                <a class="page-scroll" href="{{route('home')}}/location"><strong>Địa điểm</strong></a>
            </li>
            <li>
                <a class="page-scroll " href="{{route('home')}}/promotion"><strong>Khuyến mãi</strong></a>
            </li>
            <li>
                <a class="page-scroll" href="{{route('home')}}/#5"><strong>Liên Hệ</strong></a>
            </li>
        </ul>
    @endsection
@endsection
@section('content')
<div class="col-md-12" style ="background:#efebe4;">
	<div class="container">
        <div class="box-head">
            <h4>Liên lạc của khách hàng</h4>
        </div>
        <div class="row contact-mail relative" >
            <div class="contact-detail">
                <p style="font-size: 22px;"><strong >Họ Tên:</strong> {{$contactdetail->name}}</p>
                <p><strong>Email:</strong> {{$contactdetail->email}}</p>
                <p><strong>Phone:</strong> {{$contactdetail->phone}}</p>
                <p><strong style="font-size: 22px;">Nội dung liên lạc:</strong>
                    <blockquote>
                        <p>{{$contactdetail->message}}</p>
                    </blockquote>
                </p>
            </div>
            <div class="contact-success pull-right">
                <form class="form-horizontal" role="form" action ="{{route('admin-contact-seen',['contact'=>$contactdetail->id])}}" method ='POST' accept-charset='utf-8'>
                    {{ csrf_field() }}	
                    <button type="submit" style="margin-right: 15px;" class="btn btn-primary">Đã xem
                        <i class="fa fa-step-forward" aria-hidden="true"></i>
                    </button>
                </form>
                    <button type="button" class="btn btn-primary"><a href="https://mail.google.com">Phản hồi</a>
                            <i class="fa fa-chevron-right"></i>
                    </button>
            </div>
        </div>
    </div>
</div>
@endsection