@extends('layouts.master')
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
	<div class="col-md-12 relative">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
			</button>
			<img class="navbar-brand" src="{{asset('/admin/images/images/logo.png')}}" alt="">
			<a class="navbar-brand page-scroll" href="{{route('home')}}"><strong>ZODIAC</strong> </a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
				<li class="active">
					<a class="page-scroll" href="{{route('home')}}/location"><strong>Địa điểm</strong></a>
				</li>
				<li>
					<a class="page-scroll " href="{{route('home')}}/promotion"><strong>Khuyến mãi</strong></a>
				</li>
				<li>
					<a class="page-scroll" href="{{route('home')}}/#5"><strong>Liên Hệ</strong></a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right" style="padding-right: 65px;">
			@if(Auth::check())
				<li class="dropdown dropdown-user" >
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						@if( Auth::user()->image_avatar == null )
							<img class="img-circle" src="{{asset('/admin/images/images-avatar/avatar-null.png')}}" alt="User profile picture" style="width: 26px; height: 26px;">
						@else
							<img class="img-circle" src="{{asset('/admin/images/images-avatar')}}/{{Auth::user()->image_avatar}}" alt="User profile picture" style="width: 26px; height: 26px;">
						@endif

						@if(Auth::user()->level == 1)
							ADMIN: {{Auth::user()->lastName}}
						@elseif(Auth::user()->level == 2)
							Nhân viên: {{Auth::user()->lastName}}
						@else
							Xin chào: {{Auth::user()->lastName}}
						@endif						
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu drop-menu drop-nav">
						@if(Auth::user()->level == 1)
						
							<li><a href="{{route('profile')}}"><i class="fa fa-user" aria-hidden="true"></i> Thông tin</a></li>
							<li><a href="{{route('admin-order')}}"><i class="fa fa-book" aria-hidden="true"></i> Đơn hàng khách</a></li>
							<li><a href="{{route('admin-managerment')}}"><i class="fa fa-lock" aria-hidden="true"></i> Quản lý</a></li>
							<li><a href="{{route('admin-contact')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> Liên lạc</a></li>
							<li class="divider"></li>
							<li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a> </li>
							{{-- <li><a href="{{route('register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>Tạo tài khoản</a></li> --}}
						@elseif(Auth::user()->level == 2)
							<li><a href="{{route('profile')}}"><i class="fa fa-user" aria-hidden="true"></i> Thông tin</a></li>
							<li><a href="{{route('admin-order')}}"><i class="fa fa-book" aria-hidden="true"></i></span> Đơn hàng khách</a></li>
							<li class="divider"></li>
							<li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a> </li>
							<li><a href="{{route('register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Tạo tài khoản</a></li>
						@else
							<li><a href="{{route('profile')}}"><i class="fa fa-user" aria-hidden="true"></i> Thông tin</a></li>
							<li><a href="{{route('view-order',['user'=>Auth::user()->id])}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Đơn hàng</a></li>
							<li class="divider"></li>
							<li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a> </li>
							<li><a href="{{route('register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Tạo tài khoản</a></li>
						@endif
					</ul>
				</li>
			@else
				<li><a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i></span> Đăng nhập</a></li>
				<li><a href="{{route('register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng kí</a></li>
			
			@endif
				<li class="cart">
					<a href="{{route('cart')}}"><i class="fa fa-cart-plus" aria-hidden="true"></i> Giỏ Hàng @if(Session::has('cart'))	
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
										<div class="item-img"><a href="{{route('home')}}" style="background-image: url({{$product['item']['image']}});"></a></div>
										<div class="item-bk">
											<a class="item-name" href=""><strong>{{$product['item']['productName']}}</strong></a>
											<span class="item-quan">Số lượng: <span class="value">{{$product['quantity']}}</span></span>
											<span class="item-price">Đơn giá: <span class="value">{{number_format($product['price'],1)}}00</span><span class="currency">VNĐ</span></span>
										</div>
										<div class="item-remove">
											<a href="{{route('cart-remove-all-gohome',['id'=>$product['item']->id])}}">
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
									<a class="btn btn-next btn-yellow" href="{{route('cart')}}">THANH TOÁN</a>
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
<div class=" box-page" >
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="loca-heading">Địa điểm</h2>
                </div>
            </div>
            <div class="row">
					@foreach($location as $location) 
                <hr style="border: 1px solid #759440;">
                    <div class="list-store">
                        <div class="col-md-6 img-location">
                            <img src="{{$location->image}}" alt="">
                        </div>
                        <div class="col-md-6 content-location">
                            <p class="name-store"><b>ẨM THỰC ZODIAC</b></p>
                            <p class="value-address"><b>Địa chỉ: </b>{{$location->location}}, {{$location->city}}</p>
                            <p class="value-phone"><b>Số điện thoại: </b>{{$location->phone}}</p>
                            <p class="value-time"><b>Giờ hoạt động: </b>{{$location->time_open_close}}</p>
                        </div>
                    </div>
                <hr style="border: 1px solid #759440;">
					@endforeach
            </div>
        </div>
</div>
</section>