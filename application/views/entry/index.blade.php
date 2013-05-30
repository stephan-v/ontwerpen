@layout('master')

@section('content')
	<div id="form-header">Voeg een inzending toe</div>
	{{ Form::open_for_files() }}
		
		<ul>
			<li>Optimale afbeeldingsformaat is 1024×768</li>
			<li>Het bestand dat u upload moet JPEG, PNG of GIF formaat in RGB modus zijn.</li>
			<li>Maximum bestandsgrootte is 2MB.</li>
		</ul>
		
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