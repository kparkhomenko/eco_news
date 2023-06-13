<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/regionNewsPageStyle.css') }}" rel="stylesheet">
    <title>Новости региона</title>
</head>
<body>
	<div class="container">
		<div class="navbar">
			@include('components.navbar')
		</div>
		<div class="content_container">
            <div class="news_list">
			@foreach ($news as $news_item)
                <div class="news_item">
				<img src="{{ asset('storage/titleImages/'.$news_item->path) }}" alt="">
				<div class="title_div">
				<h1> {{ $news_item->title }}</h1>
				</div>
				<div class="text_div">
				<p> {{ $news_item->text }}</p>
				</div>
				<a class="more" href="{{ url('news/'.$news_item->id) }}"><button>Читать далее</button></a>
				</div>
			@endforeach
            </div>
			@if(empty($news_item))
			<h1 class="empty">Пока что новостей нет</h1>
			@endif
		</div>
	</div>
</body>
</html>
