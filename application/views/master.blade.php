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
					<li>{{ HTML::link_to_route('new_user', 'Sign Up') }}</li>
					<li>{{ HTML::link_to_route('new_user', 'Sign In') }}</li>
				</ul>
			</nav>
		</div>
	</header>

	<header class="header-branding"></header>

	<div id="main-container">
		<div class="container">
			@yield('content')
		</div>
	</div>

</body>
</html>