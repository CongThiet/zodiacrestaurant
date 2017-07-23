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
            <li class="active">
                <a class="page-scroll " href="{{route('home')}}/promotion"><strong>Khuyến mãi</strong></a>
            </li>
            <li>
                <a class="page-scroll" href="{{route('home')}}/#5"><strong>Liên Hệ</strong></a>
            </li>
        </ul>
    @endsection
@endsection
@section('content')
<div class=" box-page" >
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center box-top">
                    <h2 class="promo-heading">Khuyến mãi</h2>
                </div>
            </div>
            <div class="row box-content">
            @foreach($promotions as $promotion)
                <div class="col-lg-6 col-md-6 promo">
                    <div class="row">
                        <a class="col-md-6 promo-img" href="{{$promotion->link}}" title="{{$promotion->title}}" style="background-image: url('{{asset('/admin/images/images-promotion')}}/{{$promotion->image}}');"  alt="{{$promotion->title}}"></a>
                        <div class="col-md-6 promo-content ">
                            <a class="promo-title" href="{{$promotion->link}}" title="{{$promotion->title}}">{{$promotion->title}}</a>
                            <p>{{$promotion->description}}</p>
                            <button class="btn promo-next"><a href=""><i class="fa fa-forward" aria-hidden="true"></i>Xem chi tiết</a></button>
                        </div>
                    </div>
                </div>
           	@endforeach
           	</div>
        	<div class="container panginate">{{$promotions->links()}}</div>
        </div>
</div>
@endsection