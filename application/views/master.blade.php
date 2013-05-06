<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Microlancer.nl | Snelle en Goedkope Creative Diensten</title>
	{{ HTML::style('css/style.css') }}	
	{{ HTML::style('css/slider.css') }}	
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js') }}
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js') }}
	{{ HTML::script('js/hover-preview.js') }}
	{{ HTML::script('js/update-rating.js') }}
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

	@yield('banner')

	<div id="main-content">
		<div class="container">
			@yield('content')
		</div>
	</div>

	<footer>
		
	</footer>

</body>
</html>