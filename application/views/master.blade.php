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
	{{ HTML::script('js/html5shiv.js') }}
</head>
<body>
	<header class="header-navigation">
		<div class="container">
			<ul class="primary-nav">
				<li>{{ HTML::link('/', 'Home') }}</li>
				<li>{{ HTML::link('help', 'Help') }}</li>
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
		<div class="container">
			<div class="footer-column">
				<h2>Algemeen</h2>
				<ul>
					<li>{{ HTML::link('algemene-voorwaarden', 'Algemene voorwaarden') }}</li>
					<li>Over Ons</li>
					<li>Help</li>
					<li>{{ HTML::link_to_route('new_contact', 'Contact') }}</li>
				</ul>
			</div>
			<div class="footer-column">
				<h2>Website</h2>
				<ul>
					<li>{{ HTML::link('hoe-werkt-het', 'hoe werkt het?') }}</li>
					<li>Nieuws</li>
					<li>Tutorials</li>
					<li>Wat klanten zeggen</li>
					<li>Betalingen</li>
				</ul>
			</div>
			<div class="footer-column">
				<h2>Producten en Diensten</h2>
				<ul>
					<li>Logo ontwerpen</li>
					<li>Flyer ontwerpen</li>
					<li>Banner ontwerpen</li>
					<li>Website ontwerpen</li>
					<li>Bedrijfsnaam bedenken</li>
				</ul>				
			</div>
			<div class="footer-column last">
				<h2>Statistieken</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt molestie ornare.</p>

				<p>Morbi quis ipsum turpis. In ut velit justo, ac molestie metus. Aenean interdum posuere aliquet.</p>
			</div>
		</div>
	</footer>

</body>
</html>