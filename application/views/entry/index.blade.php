@layout('master')

@section('content')
	<h1>Create a new entry</h1>
	{{ Form::open() }}
		{{ Form::label('title', 'Titel') }}
		{{ Form::text('title') }}
		{{ Form::submit('Submit Entry') }}
	{{ Form::close() }}
@endsection