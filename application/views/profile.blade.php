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
			<!-- <li class="active"> voor activering van actieve link -->
			<li><a href="{{ URL::to_route('user', $user->id) }}"><div class="profile"></div>Profiel</a></li>
			@if(Auth::check())
				@if(Auth::user()->username === $user->username )
					<li><a href="{{ URL::to_route('edit_user', $user->id) }}"><div class="settings"></div>Instellingen</a></li>
					<li><a href="{{ URL::to_route('messages_user', $user->id) }}"><div class="messages"></div>Berichten</a></li>
					<li><a href="#"><div class="payments"></div>Betalingen</a></li>
				@endif
			@endif
		</ul>
	</aside>