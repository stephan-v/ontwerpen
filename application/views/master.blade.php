<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ontwerpen</title>
	{{ HTML::style('css/style.css') }}
</head>
<body>
	<header class="header-navigation">
		<div class="container">
			<ul class="primary-nav">
				<li>{{ HTML::link('/', 'Home') }}</li>
				<li><a href="#">Faq</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			<nav class="nav-user">
				<ul class="nav-userlist">
					@if(Auth::check())
						<li>{{ HTML::link_to_route('user', 'Mijn Account', array(Auth::user()->id)) }}</li>				
						<li>{{ HTML::link_to_route('logout_user', 'Log out') }}</li>	
					@else
						<li>{{ HTML::link_to_route('new_user', 'Sign Up') }}</li>
						<li>{{ HTML::link_to_route('login_user', 'Sign In') }}</li>						
					@endif
				</ul>
			</nav>
		</div>
	</header>

	<header class="header-branding">
		<div class="container">
			<h1>Ontwerpwedstrijden</h1>
		</div>
	</header>

	<div id="main-container">
		<div class="container">
			@yield('content')
		</div>
	</div>

</body>
</html>