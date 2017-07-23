@extends('layouts.master')
@section('nav')
    @extends('layouts.nav')
    @section('location')
        class="active"
    @endsection
@endsection
@section('content')
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
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
                            <img src="{{asset('/admin/images/images-location')}}/{{$location->image}}" alt="">
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

<div id="map"></div>

<!-- Replace YOUR_API_KEY here by your key above -->
<script>
	function initMap() {
		var latLngA = { lat: 21.038241, lng: 105.782711 };
		var latLngB = { lat: 21.032742, lng: 105.798391 };
		var latLngC = { lat: 21.041877, lng: 105.785918 };
		var map = new google.maps.Map(document.getElementById("map"), {
			center: { lat: 21.037085, lng: 105.790784 },
			zoom: 16,
            streetViewControl: false,
            mapTypeControl: false
		});
		var marker = new google.maps.Marker({
			position: latLngA,
			map: map,
		});
		var marker = new google.maps.Marker({
			position: latLngB,
			map: map,
		});
		var marker = new google.maps.Marker({
			position: latLngC,
			map: map,
		});
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLjecV8-LVHLOlgr_cmHeMqtn-Mh4Iqcw&callback=initMap" async defer></script>
</section>