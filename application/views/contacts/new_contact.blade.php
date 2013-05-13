@layout('master')

@section('content')

	<div id="form-header">Neem contact met ons op.</div>
	{{ Form::open() }}

		{{ Form::label('name', 'Naam') }}
		{{ Form::text('name', '', array('placeholder' => 'Uw naam'))}}

		{{ Form::label('email', 'Email') }}
		{{ Form::text('email', '', array('placeholder' => 'Uw email'))}}

		{{ Form::label('body', 'Opmerking') }}
		{{ Form::textarea('body', '', array('placeholder' => 'Uw opmerking'))}}

		{{ Form::submit('verstuur') }}

	{{ Form::close() }}

@endsection