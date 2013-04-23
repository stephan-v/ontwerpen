@layout('master')

@section('content')
	<h1>Create a new entry</h1>
	{{ Form::open_for_files() }}

		{{ Form::label('file', 'Upload your image') }}
		{{ Form::file('image') }}

		{{ Form::submit('Submit Entry') }}

	{{ Form::close() }}

	<ul class="validation-errors">
		@foreach($errors->all() as $error)
			<li class="validation-error">{{ $error }}</li>
		@endforeach	
	</ul>

@endsection