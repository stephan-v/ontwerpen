@layout('master')

@section('content')
	<h1>Voeg een inzending toe</h1>
	{{ Form::open_for_files() }}

		<p>Het bestand dat u upload moet JPEG, PNG of GIF formaat in RGB modus zijn. Maximum bestandsgrootte is 2MB.</p>
		{{ Form::label('file', 'Upload uw afbeelding') }}
		{{ Form::file('image') }}

		{{ Form::submit('Inzending toevoegen') }}

	{{ Form::close() }}

	<ul class="validation-errors">
		@foreach($errors->all() as $error)
			<li class="validation-error">{{ $error }}</li>
		@endforeach	
	</ul>

@endsection