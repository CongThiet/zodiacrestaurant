<!DOCTYPE html>
<html>
<head>
	<title>Nhà hàng ZODIAC | Ẩm thực muôn nơi</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">	
	<link rel="icon" href="{{asset('/favicon.ico')}}" type="image/x-icon">
	{{-- <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"> --}}
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/admin/css/theme.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/admin/css/restaurantonline.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/font-awesome/css/font-awesome.css')}}">
	{{-- <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> --}}
	<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alike+Angular" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('/node_modules/datepicker/datepicker3.css')}}">
	
</head>
<body>
{{-- BEGIN NAV --}}
	@yield('nav')
{{-- END NAV --}}

{{-- SECTION --}}
    @yield('content')
{{-- ENDSECTION --}}

{{-- FOOTER --}}
	@include('layouts.footer')
{{--END FOOTER --}}
</body>
</html>