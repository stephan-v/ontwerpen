@layout('master')

@section('content')

	<div id="form-header">Login</div>

	{{ Form::open() }}

		{{ Form::text('email', Input::old('email'), array('placeholder' => 'Uw email', 'id' => 'email')) }}
		{{ $errors->has('email') ? '<span class="validation-error">' . $errors->first('email') . '</span>' : '' }}

		{{ Form::password('password', array('placeholder' => 'Uw wachtwoord', 'id' => 'password')) }}
		{{ $errors->has('password') ? '<span class="validation-error">' . $errors->first('password') . '</span>' : '' }}

		{{ Form::submit('login') }}

		{{ $errors->has('active') ? '<span class="validation-error">' . $errors->first('active') . '</span>' : '' }}

		@if(Session::has('login_errors'))
			<li class="validation-error">{{ Session::get('login_errors') }}</li>
		@endif

		<div class="remember-me">
			{{ Form::checkbox('remember', 'remember me') }}
			{{ Form::label('remember', 'Laat mij ingelogd blijven.')}}
		</div>


	{{ Form::close() }}

	<div id="register-now">Geen registreerde gebruiker? {{ HTML::link_to_route('new_user', 'Schrijf je nu in!') }}</div>

@endsection