<!DOCTYPE html>
<html>
<head>
	<title>Nhà hàng ZODIAC | Ẩm thực muôn nơi</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">	
	<link rel="icon" href="../../favicon.ico" type="image/x-icon">
	{{-- <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"> --}}
	<link rel="stylesheet" type="text/css" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../admin/css/agency.css">
	<link rel="stylesheet" type="text/css" href="../../admin/css/restaurantonline.css">
	<link rel="stylesheet" type="text/css" href="../../node_modules/font-awesome/css/font-awesome.css">
	{{-- <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> --}}
	<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
</head>
<body>
{{-- BEGIN NAV --}}
	@yield('nav')
	@yield('nav-custom')
{{-- END NAV --}}

{{-- SECTION --}}
    @yield('content')
{{-- ENDSECTION --}}

{{-- FOOTER --}}
	@include('layouts.footer')
{{--END FOOTER --}}
</body>
</html>