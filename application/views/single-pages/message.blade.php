@layout('master')

@section('content')
	<p>{{ $message }}</p>
	{{ HTML::link('/', 'Ga terug naar de homepage') }}
@endsection