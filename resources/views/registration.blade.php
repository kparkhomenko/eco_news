<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/registerStyle.css') }}" rel="stylesheet">
    <title>Регистрация</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
        @include('components.navbar')
        </div>
    <div class="content_container">
    <h1>Регистрация</h1>
    <form action="{{ route('user_register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-item">
        <p>Имя пользователя</p>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>E-mail</p>
        <input type="text" name="email" value="{{ old('email') }}">
        @error('email')
        <p>{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>Пароль</p>
        <input type="password" name="password">
        @error('password')
        <p>{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>Подтвердите пароль</p>
        <input type="password" name="password_confirm">
        @error('password_confirm')
        <p>{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <input class="input-file" type="file" name="avatar">
        @error('avatar')
        <p>{{ $message }}</p>
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
        <button class="register-button" type="submit">Регистрация</button>
    </form>
    <p class="acc">есть аккаунт? Войдите</p>
    <button class="auth-button"><a href="{{ route('login') }}">Авторизация</a></button> 
    </div>
    </div>
</body>

</html>