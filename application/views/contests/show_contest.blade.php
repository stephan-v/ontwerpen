@layout('master')

@section('content')

	<h1>{{ $title }}</h1>
	<p>{{ nl2br($description) }}</p>

	<!-- ul class om alle entries te laten -->
	<ul class="contest-entries">
		@foreach($entries as $entry)
			<li class="entry-item">	
				<p>{{ $entry->title }}</p>
				<p>{{ User::find($entry->user_id)->name }}</p>
			</li>
		@endforeach
	</ul>

	{{ HTML::link_to_route('new_entry', 'Voeg een inzending toe', $contest_id, array('class' => 'btn btn-entry')) }}

@endsection