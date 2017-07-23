@extends('layouts.master')
@section('nav')
    @extends('layouts.nav')
    @section('navbar')
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
    @endsection
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {!! Charts::assets() !!}
<div class="col-md-12 box-page">
	<div class="container">
       
        <div class="box-head">
            <h4>Quản lý</h4>
        </div>
        <div class="manager-product">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#menu" role="tab" data-toggle="tab"><h4>Quản lý thực đơn</h4></a>
                </li>
                <li role="presentation" >
                    <a href="#top-menu" role="tab" data-toggle="tab"><h4>Top món ăn</h4></a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="menu">
                    <div class="manager-menu" style ="min-height: 500px;">
                        <h5>Danh mục sản phẩm</h5>
                        {{--  <form class="form-horizontal" role="form" action ="{{route('product-search')}}" method ='POST' accept-charset='utf-8'>
                                        {{ csrf_field() }}             --}}
                            <div class="input-group" id="adv-search" style="margin-bottom: 30px;">
                                <input type="text" id = "search" name = "search" class="form-control" placeholder="Tìm kiếm món ăn">
                                <div class="input-group-btn">
                                    <div class="btn-group" role="group">
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </div>
                                </div>
                            </div>
                        {{--  </form>  --}}
                            <table class="table table-hover table-condensed table-bordered table-menu" id ="table-menu">
                                <thead>
                                    <tr>
                                        <th class="col-md-2">ID</th>
                                        <th class="col-md-6">Name</th>
                                        <th class="col-md-4">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td><a href="{{route('admin-product',['product'=>$product->id])}}" title="{{$product->productName}}">{{$product->productName}}</a></td>
                                            <td>{{number_format($product->price,1)}}00 VNĐ</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="container panginate" id="paginate-menu">{{$products->links()}}</div>
                            <script>
                                $('#search').on('keyup', function(){
                                    $value = $(this).val();
                                    $.ajax({
                                        type: "get",
                                        dataType: "json",
                                        url: '/admin/product/search',
                                        data: {search: $value},
                                        success: function (result) {
                                                if(result){
                                                    $('tbody').html(result);
                                                }
                                        },
                                    });
                                    if ($value == ''){
                                        $("#paginate-menu").css("display", "block");
                                    }
                                    else{
                                        $("#paginate-menu").css("display", "none");
                                    }
                                })
                            </script>
                            {{--  @if(Session::has('products'))
                                <script>
                                    $("#table-menu").css("display", "none");
                                    $("#paginate-menu").css("display", "none");
                                </script>
                                <table class="table table-hover table-condensed table-bordered table-menu" id ="table-menu">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(session('products') as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td><a href="{{route('admin-product',['product'=>$product->id])}}" title="{{$product->productName}}">{{$product->productName}}</a></td>
                                                <td>{{number_format($product->price,1)}}00 VNĐ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif  --}}
                    </div>
                 
                </div>
                <div role="tabpanel" class="tab-pane " id="top-menu">
                    <div class="manager-highcharts">
                        {!! $chart->render() !!}
                    </div>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection