@layout('master')

@section('content')

	<div id="form-header">Login</div>

	{{ Form::open() }}

		{{ Form::text('email', '', array('placeholder' => 'Uw email', 'id' => 'email')) }}

		{{ Form::password('password', array('placeholder' => 'Uw wachtwoord', 'id' => 'password')) }}

		{{ Form::submit('login') }}

		<div class="remember-me">
			{{	Form::checkbox('remember', 'remember me') }}
			{{ Form::label('remember', 'Laat mij ingelogd blijven.')}}
		</div>


	{{ Form::close() }}

	<div id="register-now">Geen registreerde gebruiker? {{ HTML::link_to_route('new_user', 'Schrijf je nu in!') }}</div>

	<ul class="validation-errors">
		@foreach($errors->all() as $error)
			<li class="validation-error">{{ $error }}</li>
		@endforeach	

		@if(Session::has('login_errors'))
			<li class="validation-error">Username or password incorrect</li>
		@endif
	</ul>

@endsection