@layout('master')

@section('content')
	
	<h1>Maak een account aan!</h1>

	{{ Form::open() }}

		{{ Form::label('username', 'Gebruikersnaam') }}
		{{ Form::text('username', '', array('placeholder' => 'De naam die zichtbaar is op de website')) }}

		{{ Form::label('email', 'E-mail') }}
		{{ Form::text('email', '', array('placeholder' => 'email')) }}

		{{ Form::label('email', 'Uw wachtwoord') }}
		{{ Form::password('password', array('placeholder' => 'password')) }}

		{{ Form::submit('Maak uw account aan!') }}

	{{ Form::close() }}

	<ul class="validation-errors">
		@foreach($errors->all() as $error)
			<li class="validation-error">{{ $error }}</li>
		@endforeach
	</ul>
	
@endsection