@layout('master')

@section('content')
	{{ Form::open() }}

		{{ Form::label('name', 'Uw naam') }}
		{{ Form::text('name', '', array('placeholder' => 'naam')) }}

		{{ Form::label('email', 'Uw email') }}
		{{ Form::text('email', '', array('placeholder' => 'email')) }}

		{{ Form::label('email', 'Uw email') }}
		{{ Form::password('password', array('placeholder' => 'password')) }}

		{{ Form::submit('Maak uw account aan!') }}

	{{ Form::close() }}
@endsection