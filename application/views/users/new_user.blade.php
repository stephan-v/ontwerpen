@layout('master')

@section('content')
	
	<div id="form-header">Nieuw account</div>

	{{ Form::open() }}

		{{ Form::text('username', '', array('placeholder' => 'Uw gebruikersnaam', 'id' => 'email')) }}

		{{ Form::text('email', '', array('placeholder' => 'Uw email', 'id' => 'email')) }}

		{{ Form::password('password', array('placeholder' => 'Uw wachtwoord', 'id' => 'password')) }}

		{{ Form::submit('Maak uw account aan!') }}

	{{ Form::close() }}

	<ul class="validation-errors">
		@foreach($errors->all() as $error)
			<li class="validation-error">{{ $error }}</li>
		@endforeach
	</ul>
	
@endsection