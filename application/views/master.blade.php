<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Microlancer.nl | Snelle en Goedkope Creative Diensten</title>
	{{ HTML::style('css/style.css') }}
</head>
<body>
	<header class="header-navigation">
		<div class="container">
			<ul class="primary-nav">
				<li>{{ HTML::link('/', 'Home') }}</li>
				<li><a href="#">Help</a></li>
				<li>{{ HTML::link_to_route('new_contact', 'Contact') }}</li>
			</ul>
			<nav class="nav-user">
				<ul class="nav-userlist">
					@if(Auth::check())
						<li class="item1">
							{{ HTML::link_to_route('user', 'Mijn Account', array(Auth::user()->id)) }}
						</li>				
						<li>
							{{ HTML::link_to_route('logout_user', 'Uitloggen') }}
						</li>	
					@else
						<li class="item1">
							{{ HTML::link_to_route('new_user', 'Registreer') }}
						</li>
						<li>
							{{ HTML::link_to_route('login_user', 'Login') }}
						</li>						
					@endif
				</ul>
			</nav>
		</div>
	</header>

	<header class="header-branding">
		<div class="container">
			<div class="logo"><a href="{{ URL::home() }}">{{ HTML::image('img/logo.png') }}</a></div>
		</div>
	</header>

	<div id="main-container">
		<div class="container">
			@yield('content')
		</div>
	</div>

	<footer>
		
	</footer>

</body>
</html>