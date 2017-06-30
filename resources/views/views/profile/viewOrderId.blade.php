@extends('layouts.layout')
@section('nav-custom')
    @include('layouts.nav-custom')
endsection
@section('content')
<div class="col-md-12" style ="background:#efebe4;">
	<div class="container">
        <div class="row" style="padding-top: 35px;">
            <div class="box-head-order">
                <h4>Đơn hàng của bạn</h4>
                <h4>Mã đơn hàng của bạn: <b>#{{$order->id}}</b></h4>
            </div>
            <div class="row" style="min-height: 450px;">
                <div class="date_order">
                    <strong>Ngày đặt hàng: </strong><span>{{$order->created_at->toFormattedDateString()}}</span>
                </div>
                <div class="col-md-6">
                    <div class="order_info">
                        <h4><strong>Thông tin cá nhân</strong></h4>
                        <div class="space">&nbsp;</div>
                        <p><strong>Họ Tên:</strong> {{Auth::user()->name}}</p>
                        <p><strong>Email:</strong> {{Auth::user()->email}}</p>
                        <p><strong>Địa chỉ: </strong> {{Auth::user()->address}}</p>
                        <p><strong>Phone:</strong> {{Auth::user()->phone}}</p>
                    </div>
                    <div class="space">&nbsp;</div>
                    @foreach($customers as $customers)
                    <div class="order_info">
                        <h4><strong>Thông tin vận chuyển</strong></h4>
                        <div class="space">&nbsp;</div>
                        <p><strong>Họ Tên:</strong {{$customers->name}}</p>
                        <p><strong>Giới tính:</strong>{{$customers->gender}}</p>
                        <p><strong>Địa chỉ:</strong> {{$customers->address}}</p>
                        <p><strong>Phone:</strong> {{$customers->phone}}</p>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <div class="order_info">
                        <h4><strong>Hình thức thanh toán</strong></h4>
                        <div class="space">&nbsp;</div>
                        <p>{{$order->payment}}</p>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Món ăn</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($order_details as $order_details)
                    <tr>
                        <td class="col-sm-6 order-id-product"><strong>{{$order_details->productName}}</strong></td>
                        <td class=" text-center">
                            <strong>{{$order_details->quantity}}</strong>
                        </td>
                        <td class="text-center">
                            <strong>{{number_format($order_details->price,1)}}00 VNĐ</strong>
                        </td>
                        <td class="text-center">
                            <strong>{{number_format(($order_details->price)*($order_details->quantity),1)}}00 VNĐ</strong>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Tổng số tiền(đã bao gốm 10% VAT)</strong></td>
                        <td class="text-center">
                            <strong>
                                <span>{{number_format($order->totalPrice,1)}}00 VNĐ</span>
                            </strong>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection