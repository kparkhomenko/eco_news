<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/newspageStyle.css') }}" rel="stylesheet">
	<title>{{ $news_item->title }}</title>
</head>
<body>
		<div class="container">
			<div class="navbar">
			@include('components.navbar')
			</div>
			<div class="content_container">
                <img class="news_img" src="{{ asset('storage/titleImages/'.$news_item->path) }}" alt="">
                <div class="title_div">
				<h1> {{ $news_item->title }}</h1>
                </div>
<!--             @if($news_item->region == 'astrakhan')
                <div class="region_div">
                    <h2>Астраханская область</h2>
                </div>
            @elseif($news_item->region == 'volgograd')
                <div class="region_div">
                    <h2>Волгоградская область</h2>
                </div>
            @elseif($news_item->region == 'krasnodar')
                <div class="region_div">
                    <h2>Краснодарский край</h2>
                </div>
            @elseif($news_item->region == 'rostov')
                <div class="region_div">
                    <h2>Ростовская область</h2>
                </div>
            @endif -->
                <div class="text_div">
				<p> {{ $news_item->text }}</p>
                </div>
                <div class="data_div">
                    <p>{{ \Carbon\Carbon::parse($news_item->created_at)->format('d.m.Y') }}</p>
                </div>
					@auth
                    <hr>
				    <div id="comment_div">
                        <div class="think">
				    	<h1>Что вы думаете об этом?</h1>
                        </div>
				        <textarea id="comment" name="comment" id="" cols="70" rows="20" placeholder="Ваш комментарий"></textarea>
				        <button onclick="getComment('{{ $news_item->id }}')" id="comment_btn">Отправить</button>
				        <div id="error_container"></div>
				    </div>
				    @endauth
                    <h1 class="comments">Комментарии</h1>
                    <hr>
                <div class="comments_list">
                @include('components.comments')
                </div>
			</div>
		</div>

		<script>
        function sendComment(text, news_id) {
            $.ajax({
                    url: '{{ route("sendComment") }}',
                    method: 'GET',
                    data: {
                        text: text,
                        news_id: news_id
                    },
                    success: function(data) {
                        $('#comments').empty().append(data);
                        $('textarea').val('');
                        console.log(data);
                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {
                    console.log(data);
                })
        }

        function getComment(news_id) {
            let text = $('#comment').val();
            if (text.length > 300) {
                $('#error_container').empty();
                let p = '<p id="comment_error">Лимит символов превышен<p>'
                $('#error_container').append(p);
            } else
                $('#error_container').empty();
            sendComment(text, news_id);
        }

        function delete_comment(id) {
            $.ajax({
                    url: '{{ route("deleteComment") }}',
                    method: 'GET',
                    data: {
                        id: id
                    }
                })  
        }

        $('.delete_btn').click(function() {
            let id = $(this).val();
            delete_comment(id);
        })  			
		</script>
</body>
</html>