<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/addNewsPage.css') }}" rel="stylesheet">
	<title>Добавить новость</title>
</head>
<body>
    <div class="container">
        <div class="navbar">
            @include('components.navbar');
        </div>
    <div class="content_container">
	<h1>Добавление новости</h1>
	<form action="{{ route('newsuploading')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-item">
        <p>Заголовок</p>
        <input type="text" name="title" >
        <br>
        @error('title')
        <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>Изображение</p>
        <input type="file" name="image" alt="">
        <br>
        @error('image')
        <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>Основной текст</p>
        <textarea name="text" cols="30" rows="10"></textarea>
        <br>
        @error('text')
        <p class="error">{{ $message }}</p>
        @enderror
        </div>

        <div class="input-item">
        <p>Регион</p>
        <select name="region">
            <option value="astrakhan">Астраханская область</option>
            <option value="volgograd">Волгоградская область</option>
            <option value="krasnodar">Краснодарский край</option>
            <option value="rostov">Ростовская область</option>
        </select>
        @error('region')
        <p class="error">{{ $message }}</p>
        @enderror
        @if(session('success_message') !== null)
        <p class="success">{{ session('success_message') }}<p>
        <p class="success">{{ Session::forget('success_message') }}</p>
        @endif
        </div>
        <button class="upload-button" type="submit">Отправить</button>
    </form>
    </div>
    </div>
</body>
</html>