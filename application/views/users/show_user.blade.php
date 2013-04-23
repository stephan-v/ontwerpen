@layout('master')

@section('content')
	<h1>{{ $name }}</h1>
	<p>{{ $email }}</p>

	<ul class="contest-entries">
		@foreach($entries as $entry)
			<li class="entry-item">
				<img src="http://ontwerpwedstrijden.dev/uploads/{{ $entry->filename }}" width="200">
				<p>Ontwerper: {{ User::find($entry->user_id)->name }}</p>
			</li>
		@endforeach
	</ul>
	
@endsection