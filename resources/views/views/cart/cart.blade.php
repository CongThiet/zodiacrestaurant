@extends('layouts.master')
@section('nav-custom')
    @include('layouts.nav-custom')
@section('content')
<div class="container-fluid box-page relative">
    @if(session('notification'))
        <div class="alert alert-success notification">
            <strong>{{session('notification')}}</strong>
        </div>
    @endif
	<div class="container">
        <div class="row">
            <div class="col-md-12" style="padding-top: 35px;">
                <class class="box-head">
                    <h4>THANH TOÁN</h4>
                </class>
            </div>
            @if(Session::has('cart'))
            <div class="row" style="min-height: 15%;"></div>         
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <p style="max-width: 800px;">
                    Chúng tôi nhận đặt món trực tiếp từ 9h00 đến 21h00.Nhằm tránh các sự cố ngoài ý muốn 
                    đối với thực đơn của quý khách dưới đây, xin vui lòng gọi điện thoại trực tiếp đến số 1800 
                    1111 để chúng tôi được phục vụ tốt hơn và nhanh chóng hơn. Xin chân thành cảm ơn quý khách.</p>
                <p><strong>Nhà Hàng Zodiac miễn phí giao hàng trong phạm vi 7 Km.</strong></p>
                <h3>Thực đơn của bạn</h3>
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th class="text-center">Món ăn</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Đơn giá</th>
                            <th class="text-center">Thành tiền</th>
                            <th> </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($product_cart as $product)
                        <tr>
                            <td class="col-sm-6 col-md-6 order-id-product"><strong>{{$product['item']['productName']}}</strong></td>
                            <td class="col-sm-2 col-md-2 text-center">
                                <strong>{{$product['quantity']}}</strong>
                            </td>
                            <td class="col-sm-2 col-md-2 text-center">{{number_format($product['item']['price'],1)}}00 VNĐ</td>
                            <td class="col-sm-2 col-md-2 text-right"><strong>{{number_format($product['price'],1)}}00 VNĐ</strong></td>
                            <td class="col-sm-2 col-md-2">
                            <a href="{{route('cart-add',['id'=>$product['item']->id])}}" class="">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{route('cart-remove-one',['id'=>$product['item']->id])}}" class="">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                            <td class="col-sm-2 col-md-2">
                                <a href="{{route('cart-remove-all',['id'=>$product['item']->id])}}" onclick="return confirm('Bạn có muốn xóa đơn hàng này ra khỏi thực đơn của bạn?');">
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa fa-close" aria-hidden="true"></i></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    <tfoot>
                        <tr>
                            <td><strong>Tổng số tiền(đã bao gốm 10% VAT)</strong></td>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                                <strong>
                                    <span>@if(Session::has('cart')) {{number_format($totalPrice,1)}}00 VNĐ@endif</span>
                                </strong>
                            </td>
                            <td>   </td>
                            <td>   </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="../../#menu" style="text-decoration: none;">
                                    <button type="button" class="btn btn-info">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Tiếp tục đặt món
                                    </button>
                                </a> 
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <form class="form-horizontal" role="form" action ="route('order')" method ='POST' accept-charset='utf-8'>
                                {{ csrf_field() }}
                    <div class="col-md-6">
                        <h4><strong>Thông tin giao hàng</strong></h4>
                        <div class="space">&nbsp;</div>
                        <div class="form-group">
                            <label for="name">Họ tên*</label>
                            <input type="text" id="name" name ="name" class="form-control" placeholder="Họ tên" >
                            @if($errors->has('name'))
                                        <label class="col-md-6 errors-info ">
                                            <strong>{{$errors->first('name')}}</strong>
                                        </label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Giới tính </label>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>
                        </div>
                        <div class="form-group">
                            <label for="adress">Địa chỉ*</label>
                            <input type="text" id="address" class="form-control" name="address" placeholder="Địa chỉ" >
                            @if($errors->has('address'))
                                <label class="col-md-6 errors-info ">
                                    <strong>{{$errors->first('address')}}</strong>
                                </label>
                            @endif         
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại*</label>
                            <input type="text" id="phone" class="form-control" name="phone" placeholder="Số điện thoại" >
                            @if($errors->has('phone'))
                                <label class="col-md-6 errors-info ">
                                    <strong>{{$errors->first('phone')}}</strong>
                                </label>
                            @endif   
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4><strong>Yêu cầu thêm</strong></h4>
                        <div class="space">&nbsp;</div>
                        <div class="form-group">
                            <label for="notes">Ghi chú</label>
                            <textarea id="notes"  class="form-control" name="note" rows="4"></textarea>
                        </div>
                        <div class="your-order-head">
                            <h4><strong>Hình thức thanh toán</strong></h4>
                        </div>
                        <div class="space">&nbsp;</div>
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="Thanh toán khi nhận hàng" checked="checked" data-order_button_text="">
                                    <label>Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" id="content_cod" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>						
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="Thanh toán qua Internet Banking hoặc thẻ tín dụng" data-order_button_text="">
                                    <label for="payment_method_cheque">Thanh toán qua Internet Banking hoặc thẻ tín dụng</label>
                                    <div class="payment_box payment_method_cheque"  id="content_atm" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 1234 5678 9012 24
                                        <br>- Chủ TK: Trần Văn An
                                        <br>- Ngân hàng Agibank, Chi nhánh Giao Thủy - Nam Định
                                    </div>						
                                </li>
                            </ul>
                        </div>
                        @if(Auth::check())
                            <div class="hidden">
                                {{Auth::user()->name}}
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 3px;" onclick="return confirm('Bạn đã chắc chắn với những thông tin mà mình đã đặt hàng. Nhấn OK để tiếp tục?');">Đặt hàng 
                                    <i class="fa fa-chevron-right"></i>
                            </button>
                        @else
                            <div>
                                <span> <strong>Bạn cần đăng nhập để có thể đặt hàng</strong></span><br>
                                <span><a href="{{route('login')}}">Đăng nhập ngay</a></span>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 3px;">Đặt hàng 
                                    <i class="fa fa-chevron-right"></i>
                            </button>
                        @endif
                    </div>
                </form>
            </div>
            @else
                <div class="col-md-12" style ="background:#efebe4;">
                    <div class="row text-center" style="min-height: 49%;">
                    <div class="row" style="min-height: 20%;"></div>
                        <strong>
                        <p>Thực đơn của bạn hiện chưa có món ăn nào</p>
                        <p>Xin vui lòng đặt món</p>
                        <p>Ấn vào đây để tiếp tục mua sắm</p>
                        </strong>
                        <a href="{{route('home')}}/#menu" style="text-decoration: none;">
                            <button type="button" class="btn btn-primary">
                                <span class="glyphicon glyphicon-shopping-cart"></span>Thực đơn
                            </button>
                        </a>
                    </div>
                
                </div>
            @endif
        </div>
    </div>
</div>
@endsection