@extends('layouts.layout')
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
	<div class="col-md-12 relative">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
			</button>
			<img class="navbar-brand" src="../../admin/images/images/logo.png" alt="">
			<a class="navbar-brand page-scroll" href="../../"><strong>ZODIAC</strong> </a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="hidden">
					<a href="#page-top"></a>
				</li>
				<li>
					<a class="page-scroll" href="../../#1"><strong>Giới thiệu</strong></a>
				</li>
				<li>
					<a class="page-scroll" href="../../#menu"><strong>Thực đơn</strong></a>
				</li>
				<li>
					<a class="page-scroll" href="../../location"><strong>Địa điểm</strong></a>
				</li>
				<li class="active">
					<a class="page-scroll " href="../../promotion"><strong>Khuyến mãi</strong></a>
				</li>
				<li>
					<a class="page-scroll" href="../../#5"><strong>Liên Hệ</strong></a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right" style="    padding-right: 65px;">
				@if(Auth::check())
				<li class="dropdown ">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						@if( Auth::user()->image_avatar == 0 )
                            <img class="img-circle" src="../../admin/images/images-avatar/avatar-null.png" alt="User profile picture" style="width: 26px; height: 26px;">
                        @else
                            <img class="img-circle" src="../../admin/images/images-avatar/{{Auth::user()->image_avatar}}" alt="User profile picture" style="width: 26px; height: 26px;">
                        @endif
						Xin chào {{Auth::user()->lastName}}
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu drop-menu drop-nav">
						<li><a href="../../profile"><i class="fa fa-user" aria-hidden="true"></i> Thông tin</a></li>
						<li><a href="../../vieworder/{{Auth::user()->id}}"><i class="fa fa-cart-plus" aria-hidden="true"></i> Đơn hàng</a></li>
						<li class="divider"></li>
						<li><a href="../../logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a></li>
						<li><a href="../../register"><i class="fa fa-user-plus" aria-hidden="true"></i> Tạo tài khoản</a></li>
					</ul>
				</li>
				@else
				<li><a href="../../login"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
				<li><a href="../../register"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng kí</a></li>
				
				@endif
				<li class="cart">
					<a href="../../cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Giỏ Hàng @if(Session::has('cart'))	
						<span>({{$totalQty}})</span> 
						@else 
						<span>(0)</span> @endif
					</a>
				@if(Session::has('cart'))
					<div class="cart-content">

						<div class="cart-list">
							<div class="cart-list-w">
						@foreach($product_cart as $product)
								<div class="cart-item">
									<div class="cart-item-w">
										<div class="item-img"><a href="../../" style="background-image: url({{$product['item']['image']}});"></a></div>
										<div class="item-bk">
											<a class="item-name" href=""><strong>{{$product['item']['productName']}}</strong></a>
											<span class="item-quan">Số lượng: <span class="value">{{$product['quantity']}}</span></span>
											<span class="item-price">Đơn giá: <span class="value">{{number_format($product['price'],1)}}00</span><span class="currency">VNĐ</span></span>
										</div>
										<div class="item-remove">
											<a href=" ../removeAllGoMenu/{{$product['item']->id}}">
												<button type="button" class="btn btn-danger">
													<span class="glyphicon glyphicon-remove"></span>
												</button>
											</a>
										</div>
									</div>
								</div>
						@endforeach
								<div class="cart-total">
									<span class="item-price"><strong>Tổng cộng:</strong> <span class="value">@if(Session::has('cart')) {{number_format($totalPrice,1)}}00 @else 0 @endif</span><span class="currency">VNĐ</span></span>
								</div>
								<div class="cart-btns">
									<a class="btn btn-next btn-yellow" href="../../cart">THANH TOÁN</a>
								</div>
							</div>
						</div>
					</div>
				@else
					<div class="cart-content" style="min-height: 100px">
						<div class="cart-list">
							<div class="cart-list-w">
								<p class="text-center"><strong>Thực đơn của bạn hiện chưa có món ăn nào <br> Xin vui lòng đặt món</strong></p>
							</div>
						</div>
					</div>
				@endif
				</li>
			</ul>
		</div>
	</div>
</nav>
@section('content')
<div class=" box-profile" >
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
                        <a class="col-md-6 promo-img" href="{{$promotion->link}}" style="background-image: url('{{$promotion->image}}');"  alt="{{$promotion->title}}"></a>
                        <div class="col-md-6 promo-content ">
                            <a class="promo-title" href="{{$promotion->link}}">{{$promotion->title}}</a>
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