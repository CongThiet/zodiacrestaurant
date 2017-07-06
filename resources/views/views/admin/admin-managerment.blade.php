@extends('layouts.master')
@section('nav-custom')
    @include('layouts.nav-custom')
@endsection
@section('content')
<div class="col-md-12 box-page">
	<div class="container">
       
        <div class="box-head">
            <h4>Quản lý sản phẩm</h4>
        </div>
        <div class="mangager-highcharts" style="min-height: 700px;">
                {!! Charts::assets() !!}
                {!! $chart->render() !!}
        </div>
    
    </div>
</div>
@endsection