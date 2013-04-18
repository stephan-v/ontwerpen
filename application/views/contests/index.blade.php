@layout('master')

@section('content')
	<h1>Wedstrijden</h1>
	<ul class="contests-loop">
		@foreach($contests as $contest)
			<li>
				<!-- link naar single page met de id van deze contest -->
				<h1>{{ HTML::link_to_route('contest', $contest->title, $contest->id) }}</h1>
				<p>{{ $contest->description }}</p>
			</li>
		@endforeach
	</ul>
@endsection