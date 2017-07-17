@extends('layouts.master')
@section('nav')
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
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
@endsection
@section('content')
<div class="col-md-12 box-page">
	<div class="container">
		<div class="row ">
			<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 " style="height: 520px;">                    
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Đăng Nhập</div>
						<div class="forget-password" ><a href="#">Quên mật khẩu?</a></div>
					</div>     

					<div class="panel-body" >

						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form class="form-horizontal" role="form" action ={{route('login')}} method ='POST' accept-charset='utf-8'>
							{{ csrf_field() }}	
							<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input id="login-email" type="text" class="form-control" name="email" value="" placeholder="Email" >                                        
							</div>
								
							<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input id="login-password" type="password" class="form-control" name="password" placeholder="Mật khẩu" >
							</div>

							<div class="input-group">
								<div class="checkbox">
									<label>
										<input id="login-remember" type="checkbox" name="remember" value="1"> Ghi nhớ
									</label>
								</div>
							</div>

							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
										<button type="submit" class="btn btn-info">Đăng nhập</button>
										<a id="btn-fblogin" href="#" class="btn btn-primary">Đăng nhập với Facebook</a>
									
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										Bạn chưa là thành viên? 
										{{-- <a href="../../register" onClick="$('#loginbox').hide(); $('#signupbox').show()">Đăng kí ngay</a> --}}
										<a href="{{route('register')}}">Đăng kí ngay</a>									
									</div>
								</div>
							</div>
								@include('layouts.errors') 
						</form>     
					</div>                     
				</div>  
			</div>
		</div>
	</div>
</div>

@endsection