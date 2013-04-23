@layout('master')

@section('content')

	<h1>Neem contact met ons op</h1>
	{{ Form::open() }}

		{{ Form::label('name', 'Naam') }}
		{{ Form::text('name', '', array('placeholder' => 'Uw naam'))}}

		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', '', array('placeholder' => 'Uw email'))}}

		{{ Form::label('comment', 'Opmerking') }}
		{{ Form::textarea('comment', '', array('placeholder' => 'Uw opmerking'))}}

		{{ Form::submit('verstuur') }}

	{{ Form::close() }}

@endsection