@layout('master')

@section('content')

	<h1>{{ $title }}</h1>
	<p>{{ $description }}</p>

	<ul class="contest-entries">
		@foreach($entries as $entry)
			<li class="entry-item">	
				<p>{{ $entry->title }}</p>
				<p> {{ User::find($entry->id)->name }}</p>
			</li>
		@endforeach
	</ul>

@endsection