@extends('layouts.master')
@section('nav-custom')
    @include('layouts.nav-custom')
@endsection
@section('content')
<div class="col-md-12" style ="background:#efebe4;">
	<div class="container">
        <div class="box-head">
            <h4>Liên lạc của khách hàng</h4>
        </div>
        <div class="row contact-mail relative" >
        @foreach($contacts as $contactdetail)
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
        @endforeach
        </div>
    </div>
</div>
@endsection