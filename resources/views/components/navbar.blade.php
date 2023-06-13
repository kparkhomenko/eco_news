		<a class="logo" href="">EcoUgNews</a>
		<a class="mainpage" href="{{ route('mainPage') }}">Главная</a>
		<a class="region_map" href="{{ route('regionMap') }}">Карта регионов</a>
	@auth
		<a class="userpage" href="{{ url('userpage/'.Auth::user()->id) }}">Личный кабинет</a>
		<a class="logout" href="{{ route('logout') }}">Выйти</a>
	@endauth 
	@guest
		<a class="login" href="{{ route('login') }}">Войти</a>
	@endguest

	<style type="text/css">
		a {
			text-decoration: none;
			color: #000000;
		}

		.logo {
			font-size: 36px;
			margin: 2%;
			position: relative;
			top: 3vh;
		}

		.mainpage, .region_map, .login, .logout, .userpage {
			font-size: 32px;
			position: relative;
			top: 3vh;
		}

		.mainpage {
			margin-left: 8%;
		}

		.region_map {
			margin-left: 11%;
		}

		.userpage {
			margin-left: 8%;
		}

		.login {
			margin-left: 35%;
		}

		.logout {
			margin-left: 11%;
		}

		a:hover {
			color: #485E5C;
		}
	</style>
