<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/mainpageStyle.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<title>Главная</title>
</head>
<body>
	<div class="container">
		<div class="navbar">
		@include('components.navbar')
		</div>
		<div class="content_container">
			@auth
			<a class="add_button_a" href="{{ route('newsupload') }}"><button class="add_button">Добавить новость</button></a>
			@endauth
		<div class="news_list">
		@foreach ($news as $news_item)
		<div class="news_item">
			@if($news_item->region == 'astrakhan')
				<div class="region_div">
					<h1>Астраханская область</h1>
				</div>
            @elseif($news_item->region == 'volgograd')
				<div class="region_div">
					<h1>Волгоградская область</h1>
				</div>
        	@elseif($news_item->region == 'krasnodar')
				<div class="region_div">
					<h1>Краснодарский край</h1>
				</div>
        	@elseif($news_item->region == 'rostov')
				<div class="region_div">
					<h1>Ростовская область</h1>
				</div>
    		@endif
		<img src="{{ asset('storage/titleImages/'.$news_item->path) }}" alt="">
		<div class="title_div">
		<h1> {{ $news_item->title }}</h1>
		</div>
		<div class="text_div">
		<p> {{ $news_item->text }}</p>
		</div>
		<a class="more" href="{{ url('news/'.$news_item->id) }}"><button>Читать далее</button></a>
		@auth
		@if(Auth::user()->status == 'admin')
		@if($news_item->status == 'unmoderated')
		<button value="{{ $news_item->id }}" class="confirm_btn">Опубликовать новость</button>
		@endif
		<button value="{{ $news_item->id }}" class="delete_btn">Удалить новость</button>
		@endif
		@endauth
		</div>
		@endforeach
		</div>
			@if(empty($news_item))
			<h1 class="empty">Пока что новостей нет</h1>
			@endif
		</div>
	</div>

	<script>
        function change(id) {
            $.ajax({
                    url: '{{ route("statusChange") }}',
                    method: 'GET',
                    data: {
                        id: id
                    }
                })	
        }

        $('.confirm_btn').click(function() {
            let id = $(this).val();
            change(id);
        })

        function delete_news(id) {
            $.ajax({
                    url: '{{ route("deleteNews") }}',
                    method: 'GET',
                    data: {
                        id: id
                    }
                })	
        }

        $('.delete_btn').click(function() {
            let id = $(this).val();
            delete_news(id);
        })          
	</script>

</body>
</html>