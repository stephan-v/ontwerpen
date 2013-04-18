@layout('master')

@section('content')
	<h1>{{ $name }}</h1>
	<p>{{ $email }}</p>

	<ul class="entries">
		@foreach($entries as $entry)
			<li class="entry-item">{{ $entry->title }}</li>
		@endforeach
	</ul>
	
@endsection