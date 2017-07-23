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
<div class="col-md-12 box-page">
	<div class="container">
       
        <div class="box-head">
            <h4>Món ăn: <i style="text-transform: uppercase;">{{$products->productName}}</i></h4>
        </div>
        <div class="col-lg-4 col-md-4 product-control">
            <div class="thumbnail " style="min-height: 600px;">
                <form class="form-horizontal" role="form" action ="{{route('admin-product-update',['product'=>$products->id])}}" method ='POST' accept-charset='utf-8' enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                    <div class="thumbnail-image">
                        <img  src="{{asset('/admin/images/images-product')}}/{{$products->image}}"  alt="image-menu" id="image-menu">
                        <div class="browsefile" title="Thay đổi">Thay đổi
                            <input  id="file" type="file" name="image_menu" accept="image/jpg, image/jpeg, image/png" onchange="readURL(this);" value="{{asset('/admin/images/images-product')}}/{{$products->image}}" >
                        </div>
                    </div>
                    <div class="product-caption">
                        <input type="text" class="form-control" id="productName" name="productName" value="{{$products->productName}}" >
                        <input type="text" class="form-control" id="price" name="price" value="{{$products->price}}" >
                        <button class="btn btn-primary" type="submit">Lưu</button>
                        
                    </div>
                </form>
                <form class="form-horizontal" role="form" action ="{{route('admin-product-remove',['product'=>$products->id])}}" method ='POST' accept-charset='utf-8'>
                                        {{ csrf_field() }}                  
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa món ăn này ra khỏi menu của cửa hàng?');">Xóa
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image-menu')
                    .attr('src', e.target.result)
                    .width(348)
                    .height(348);
            };

            reader.readAsDataURL(input.files[0]);
        };
    };
</script>
@endsection