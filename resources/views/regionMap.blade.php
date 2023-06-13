<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ asset('css/regionMapStyle.css') }}" rel="stylesheet">
	<title>Карта регионов</title>
</head>
<body>
	<div class="container">
		<div class="navbar">
			@include('components.navbar')
		</div>
		<div class="content_container">
		<img class="map" src="{{ asset('storage/img/map.png') }}" alt="">
		<a href="{{ url('regionPage/volgograd') }}"><img class="marker1" src="{{ asset('storage/img/mark.png') }}"></a>
		<a href="{{ url('regionPage/astrakhan') }}"><img class="marker2" src="{{ asset('storage/img/mark.png') }}"></a>
		<a href="{{ url('regionPage/rostov') }}"><img class="marker3" src="{{ asset('storage/img/mark.png') }}"></a>
		<a href="{{ url('regionPage/krasnodar') }}"><img class="marker4" src="{{ asset('storage/img/mark.png') }}"></a>
		</div>
	</div>
</body>