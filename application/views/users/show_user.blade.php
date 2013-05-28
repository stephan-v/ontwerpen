@layout('master')

@section('content')

	@include('profile')

	<section class="testcontent">
		<h1>Mijn Profiel</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, incidunt deleniti asperiores tempore error architecto! Vitae, veritatis, cumque labore in autem numquam cum dolore consectetur et officiis quis repellendus error.</p>

		<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, laudantium, doloribus delectus qui dignissimos alias ipsam ut id excepturi officiis minima eius autem veniam necessitatibus maiores inventore blanditiis aliquid expedita.</p>
	</section>

	{{-- If user has contests, display contests header and all user contests --}}
	@if( !empty($contests) )
		@include('table')
	@endif

	{{-- If user has entries, display entries header and all user entries --}}
	@if( !empty($entries) )
		<section id="entries">
			<div class="entries-header">
				<h2>Inzendingen</h2>
			</div>
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
						<p>Ontwerper: {{ HTML::link_to_route('user', User::find($entry->user_id)->username, array(User::find($entry->user_id)->id)) }}</p>
					</li>
					<?php $i++; ?>
				@endforeach
			</ul>
		</section>
	@endif
	
@endsection