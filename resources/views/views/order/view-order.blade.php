@extends('layouts.master')
@section('nav-custom')
    @include('layouts.nav-custom')
@endsection
@section('content')
<div class="col-md-12 box-page">
	<div class="container">
        <div class="box-head">
            <h4>Đơn hàng của bạn</h4>
        </div>
        <div class="row" style="min-height: 500px;">
            <div class="col-md-6">
                <div class="order_info">
                    <h4><strong>Thông tin cá nhân</strong></h4>
                    <div class="space">&nbsp;</div>
                        <p><strong>Họ Tên:</strong> {{Auth::user()->name}}</p>
                        <p><strong>Email:</strong> {{Auth::user()->email}}</p>
                        <p><strong>Địa chỉ: </strong> {{Auth::user()->address}}</p>
                        <p><strong>Phone:</strong> {{Auth::user()->phone}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="order_info">
                    <h4><strong>Tất cả đơn hàng</strong></h4>
                    <div class="space">&nbsp;</div>
                    @foreach($orders as $order)
                        <div class="list-order-user">
                            <span><strong>Mã đơn hàng:</strong><i>#{{$order->id}}</i></span>
                            <a class="btn btn-app" href="{{route('view-order-detail',['order'=>$order->id])}}" ><i class="fa fa-play"></i> Xem chi tiết</a>
                            <p><strong >Ngày đặt hàng:</strong><i>{{$order->orderDate}}</i></p>
                            <p><strong >Trạng thái đơn hàng:</strong><i>{{$order->status}}</i></p><br>
                        </div>
                    @endforeach
                </div>
                <div class="container panginate">{{$orders->links()}}</div>
            </div>
        </div>
    </div>
</div>
@endsection