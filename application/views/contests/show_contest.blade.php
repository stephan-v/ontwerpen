@layout('master')

@section('content')

	<h1>{{ $title }}</h1>

	<p class="startdate">Begin wedstrijd: {{ $startdate }}</p>
	<p class="enddate">Einde wedstrijd: {{ $enddate }}</p>

	<h2>Briefing:</h2>
	<p>{{ nl2br($description) }}</p>


	<h2>Inzendingen:</h2>
	<!-- ul class om alle entries te laten -->
	<ul class="contest-entries">
		<?php $i = 1; ?>
		@foreach($entries as $entry)
			@if($i % 4 == 0)
			<li class="entry-item last">
			@else
			<li class="entry-item">
			@endif
				<a href="http://ontwerpwedstrijden.dev/uploads/{{ $entry->filename }}" class="preview"><img src="http://ontwerpwedstrijden.dev/uploads/{{ $entry->filename }}" /></a>
				<p>Ontwerper: {{ HTML::link_to_route('user', User::find($entry->user_id)->name, array(User::find($entry->user_id)->id)) }}</p>
			</li>
			<?php $i++; ?>
		@endforeach
	</ul>

	@if(Auth::check())
		{{ HTML::link_to_route('new_entry', 'Voeg een inzending toe', $contest_id, array('class' => 'btn btn-entry')) }}
	@endif

@endsection