@extends('layouts.master')
@section('nav-custom')
    @include('layouts.nav-custom')
@endsection
@section('content')
<div class="col-md-12 box-page">
	<div class="container">
        <div class="box-head" >
            <h4>Tất cả đơn hàng</h4>
        </div>
        <div class="box-order" >
        {{-- "../../vieworder/{{$order->user_id}}/{{$order->id}}" --}}
            <div class="col-md-6 view-day">
                <div class="row">
                    <h4><strong>Ngày hôm nay:<i style="margin-left: 67px;"> {{$today}}</i></strong></h4>
                    <div class="space">&nbsp;</div>
                    <div class="order-today">
                        <h4><strong>Đơn hàng ngày: <i style="margin-left: 50px;">{{$today}}</i></strong></h4><br>
                        
                        @foreach($orders as $order)
                        <div class="list-order">
                            <span><strong >Mã đơn hàng:</strong><i style="margin-left: 15px;">#{{$order->id}}</i></span>
                            <span style="margin-left: 35px"><strong >Trạng thái:</strong><i style="margin-left: 15px;"> {{$order->status}}</i></span><br>
                            <span><strong >Người nhận đơn hàng:</strong><i style="margin-left: 15px; min-height: 50px;">{{$order->nameShip}}</i></span><br>
                            <a class="btn btn-app" href="{{route('view-order-detail',['order'=>$order->id])}}" ><i class="fa fa-play"></i> Xem chi tiết</a><br><br>
                        </div>
                        @endforeach
                    </div>
                    <div class="container panginate">{{$orders->links()}}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h4 ><strong >Xem đơn hàng khác:</strong></h4>
                    <div class="space">&nbsp;</div>
                    <div class="col-sm-4 select-day">
                        <h4><strong>Chọn ngày: </strong></h4>
                    </div>
                    <form class="form-horizontal" role="form" action ="{{route('admin-order-cus')}}" method ='POST' accept-charset='utf-8'>
                        {{ csrf_field() }}
                    <div class="col-sm-6">
                        <div class="input-group date">
                        <input type="text" name="day" class="form-control pull-right datepicker" id="datepicker" placeholder="yyyy/mm/dd" data-date-format="yyyy/mm/dd">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-block btn-success btn-sm btn-custom" type="submit"><h6><strong>Xem </strong></h6></button>
                    </div>
                    </form>
                </div>
                    <br>
                        <div class="order-select-day row">
                        @if(session('day'))
                                <span><h4><strong>Đơn hàng ngày: </strong><i style="margin-left: 35px;">{{session('day')}}</i></h4></span><br>
                        @endif
                        @if(session('orderDay'))
                        @foreach(session('orderDay') as $orderDay)
                            <div class="list-order-select">
                                <span><strong >Mã đơn hàng:</strong><i style="margin-left: 15px;">#{{$orderDay->id}}</i></span>
                                <span style="margin-left: 35px"><strong >Trạng thái:</strong><i style="margin-left: 15px;"> {{$orderDay->status}}</i></span><br>
                                <span><strong >Người nhận đơn hàng:</strong><i style="margin-left: 15px; min-height: 50px;">{{$orderDay->nameShip}}</i></span><br>
                                <a class="btn btn-app" href="{{route('view-order-detail',['order'=>$orderDay->id])}}" ><i class="fa fa-play"></i> Xem chi tiết</a><br><br>
                            </div>
                        @endforeach
                        @endif
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection