@layout('master')

@section('content')
	<h1>Login</h1>
	{{ Form::open() }}

		{{ Form::label('email', 'Uw email')}}
		{{ Form::text('email', '', array('placeholder' => 'Uw email')) }}

		{{ Form::label('password', 'Uw password') }}
		{{ Form::password('password', array('placeholder' => 'Uw wachtwoord')) }}

		{{ Form::submit('login') }}

	{{ Form::close() }}

	<ul class="validation-errors">
		@foreach($errors->all() as $error)
			<li class="validation-error">{{ $error }}</li>
		@endforeach	

		@if(Session::has('login_errors'))
			<li class="validation-error">Username or password incorrect</li>
		@endif
	</ul>

@endsection