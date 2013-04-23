@layout('master')

@section('content')

	<h1>{{ $title }}</h1>

	<p class="startdate">Begin wedstrijd: {{ $startdate }}</p>
	<p class="enddate">Einde wedstrijd: {{ $enddate }}</p>

	<h2>Briefing:</h2>
	<p>{{ nl2br($description) }}</p>

	<!-- ul class om alle entries te laten -->
	<ul class="contest-entries">
		@foreach($entries as $entry)
			<li class="entry-item">
				<img src="http://ontwerpwedstrijden.dev/uploads/{{ $entry->filename }}" width="200">
				<p>Ontwerper: {{ User::find($entry->user_id)->name }}</p>
			</li>
		@endforeach
	</ul>

	@if(Auth::check())
		{{ HTML::link_to_route('new_entry', 'Voeg een inzending toe', $contest_id, array('class' => 'btn btn-entry')) }}
	@endif

@endsection