@extends('layouts.layout')
@section('nav')
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
	<div class="container">
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
					<a class="page-scroll" href="../../#5"><strong>Liên Hệ</strong></a>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
@endsection
@section('content')
<div class="col-md-12" style ="background:#efebe4;">
	<div class="container">
		<div class="row">
			<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Đăng kí</div>
						<div  id="signinlink"><a href="../../login">Đăng nhập ngay</a></div>						
					</div>  
					<div class="panel-body" >
						 <form class="form-horizontal" action ='../../register' method ='POST' accept-charset='utf-8' >
						 {{ csrf_field() }}
						 	<div class="form-group">
								<label for="lastName" class="col-md-3 control-label">Tên</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="lastName" placeholder="Tên người dùng. VD: An,Cúc" >
								</div>
									@if($errors->has('lastName'))
                                         <label class="col-md-9 errors-signin ">
                                            <strong>{{$errors->first('lastName')}}</strong>
                                        </label>
                                @endif
							</div>
							<div class="form-group">
								<label for="name" class="col-md-3 control-label">Họ và Tên</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="name" placeholder="Họ và tên" >
								</div>
								@if($errors->has('name'))
                                         <label class="col-md-9 errors-signin ">
                                            <strong>{{$errors->first('name')}}</strong>
                                        </label>
                                @endif
							</div>

							<div class="form-group">
								<label for="address" class="col-md-3 control-label">Địa Chỉ</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="address" placeholder="Địa chỉ" >
								</div>
								@if($errors->has('address'))
                                         <label class="col-md-9 errors-signin ">
                                            <strong>{{$errors->first('address')}}</strong>
                                        </label>
                                @endif
							</div>

							<div class="form-group">
								<label for="phone" class="col-md-3 control-label">Số điện thoại</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="phone" placeholder="Số điện thoại" >
								</div>
								@if($errors->has('phone'))
                                        <label class="col-md-9 errors-signin ">
                                            <strong>{{$errors->first('phone')}}</strong>
                                        </label>
                                @endif
							</div>

							<div class="form-group">
								<label for="email" class="col-md-3 control-label">Email</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="email" placeholder="Email" >
								</div>
								@if($errors->has('email'))
                                        <label class="col-md-9 errors-signin ">
                                            <strong>{{$errors->first('email')}}</strong>
                                        </label>
                                @endif
							</div>
								

							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Mật khẩu" >
								</div>
								@if($errors->has('password'))
                                         <label class="col-md-9 errors-signin ">
                                            <strong>{{$errors->first('password')}}</strong>
                                        </label>
                                @endif
							</div>
								
							<div class="form-group">
								<label for="icode" class="col-md-3 control-label">Nhập lại mật khẩu</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu">
								</div>
							</div>

							<div class="form-group">
								<!-- Button -->                                        
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn btn-info">Đăng nhập</button>
									<span style="margin-left:8px;">hoặc</span>  
								</div>
							</div>

							<div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Đăng kí với Facebook</button>
								</div>                                           
							</div>
						</form>
					</div>
				</div>
			</div> 
		</div>
	</div>
</div>
@endsection