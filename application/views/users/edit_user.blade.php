@layout('master')

@section('content')

	<aside id="user-navigation">
		<div class="user-info">
			<div class="profile-picture">
				<img src="http://www.seducingwithstyle.com/wp-content/uploads/2013/01/ryan-gosling-bp__span-100x100.jpeg" alt="">
			</div>
			<div class="profile-info">
				<p>{{ $user->username }}</p>
			</div>
		</div>
		<h1>Gebruiker</h1>
		<ul>
			<li><a href="{{ URL::to_route('user', $user->id) }}"><div class="profile"></div>Profiel</a></li>
			<li><a href="{{ URL::to_route('edit_user', $user->id) }}"><div class="settings"></div>Settings</a></li>
			<li><a href="#"><div class="messages"></div>Berichten</a></li>
			<li><a href="#"><div class="payments"></div>Betalingen</a></li>
		</ul>
	</aside>

	<section class="testcontent">
		<h1>Instelingen</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, incidunt deleniti asperiores tempore error architecto! Vitae, veritatis, cumque labore in autem numquam cum dolore consectetur et officiis quis repellendus error.</p>

		<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, laudantium, doloribus delectus qui dignissimos alias ipsam ut id excepturi officiis minima eius autem veniam necessitatibus maiores inventore blanditiis aliquid expedita.</p>
	</section>

@endsection