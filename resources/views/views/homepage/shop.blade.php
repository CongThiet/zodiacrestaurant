@extends('layouts.master')
@section('nav')
	@include('layouts.nav')
@endsection
@section('content')
<div class="top-banner relative">
         @if(session('orderfail'))
            <div class="alert alert-danger noti" role="alert">
                <strong>{{session('orderfail')}}</strong>
            </div>
        @endif
        @if(session('noti'))
            <div class="alert alert-success noti" role="alert">
                <strong>{{session('noti')}}</strong>
            </div>
        @endif
        @if(session('contact'))
                <div class="alert alert-success noti">
                    <strong>{{session('contact')}}</strong>
                </div>
            @endif
        <div class="row">
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="">
                                    <img class="slide-image" style="height: 450px;" src="{{asset('/admin/images/images-promotion/tinh-hoa-am-thuc-viet.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <img class="slide-image" style="height: 450px;" src="{{asset('/admin/images/images-promotion/cafe-12k.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="item ">
                                <a href="">
                                    <img class="slide-image" style="height: 450px;" src="{{asset('/admin/images/images-promotion/bun-bo-25k.jpg')}}" alt="">
                                </a>
                            </div> 
                            <div class="item">
                                <a href="">
                                    <img class="slide-image" style="height: 450px;" src="{{asset('/admin/images/images-promotion/combo-re.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <img class="slide-image" style="height: 450px;" src="{{asset('/admin/images/images-promotion/mua-1-tang-1.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>

                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>

                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                    </div>
                    <div class="input-order-location relative">
                        <a class="input-order" href="{{route('home')}}/#menu"><h4>Đặt món</h4></a>
                        <a class="input-location" href="{{route('location')}}"><h4>Địa điểm</h4></a>                              
                    </div>
                </div>
			</div>
        </div>
</div>
    <section id="menu" class="bg-light-gray">
        <div class="container">
            <div class="row" style="padding-bottom: 15px;">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">-----    THỰC ĐƠN    -----</h2>
                    <div class="row">
                        <ul class="col-sm-12 list-item" id="sub-header">
                            @foreach($category as $category)
                                <li class="col-sm-2 list-item-menu" >
                                    <a style="color: #d8ffcc;" href="{{route('category',['category'=>$category->id])}}/#menu"><h4><strong>{{$category->category}} </strong></h4></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($product as $item)
                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <div class="thumbnail-img">
                            <img src="{{asset('/admin/images/images-product')}}/{{$item->image}}" alt="">
                        </div>
                        <div class="caption">
                            <h4>{{$item->productName}} </h4>
                            <h4 class="pull-right">{{number_format($item->price,1)}}00 VNĐ</h4>					
                            <a href="{{route('cart-add-gohome',['id'=>$item->id])}}"><button class="btn btn-success" type="submit">Đặt món</button></a>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">15 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="container panginate">{{$product->fragment('menu')->links()}}</div>
    </section>
    @include('views.homepage.about-us')
    @include('views.homepage.contact')
@endsection
