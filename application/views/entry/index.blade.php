@layout('master')

@section('content')
	<div id="form-header">Voeg een inzending toe</div>
	{{ Form::open_for_files() }}

		<p>Het bestand dat u upload moet JPEG, PNG of GIF formaat in RGB modus zijn. Maximum bestandsgrootte is 2MB.</p>
		{{ Form::label('file', 'Upload uw afbeelding') }}
		{{ Form::file('image') }}

		{{ Form::submit('Inzending toevoegen', array('class' => 'submit-entry')) }}

	{{ Form::close() }}

	<ul class="validation-errors">
		@foreach($errors->all() as $error)
			<li class="validation-error">{{ $error }}</li>
		@endforeach	
	</ul>

@endsection