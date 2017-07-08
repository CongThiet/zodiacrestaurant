@extends('layouts.master')
@section('nav-custom')
    @include('layouts.nav-custom')
@endsection
@section('content')
    {!! Charts::assets() !!}
<div class="col-md-12 box-page">
	<div class="container">
       
        <div class="box-head">
            <h4>Quản lý</h4>
        </div>
        {{-- <div class="manager-product">
            <h4>Quản lý sản phẩm</h4>
            <div class="manager-menu">
               
            </div>
        </div> --}}
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
                        <form class="form-horizontal" role="form" action ="{{route('product-search')}}" method ='POST' accept-charset='utf-8'>
                                        {{ csrf_field() }}           
                            <div class="input-group" id="adv-search" style="margin-bottom: 30px;">
                                <input type="text" name = "search" class="form-control" placeholder="Tìm kiếm món ăn">
                                <div class="input-group-btn">
                                    <div class="btn-group" role="group">
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                            <table class="table table-hover table-condensed table-bordered table-menu" id ="table-menu">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
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
                            @if(Session::has('products'))
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
                            {{-- @else
                            <div class="row text-center" >
                                <div class="box-search-null">
                                    <strong>
                                    <p>Không có món ăn nào được tìm thấy!!!</p>
                                    <p>Trở lại</p>
                                    </strong>
                                    <a href="{{route('admin-managerment')}}" style="text-decoration: none;">
                                        <button type="button" class="btn btn-primary">
                                            Trang quản lý
                                        </button>
                                    </a>
                                </div>
                            </div> --}}
                            @endif
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