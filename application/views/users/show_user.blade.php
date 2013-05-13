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
		<section id="contests">
			<div class="entries-header">
				<h2>Mijn wedstrijden</h2>
			</div>

			<table>
				<thead>
					<tr>
						<th class="column-40">WEDSTRIJDNAAM</th>
						<th class="column-20">EINDIGT OVER</th>
						<th class="column-10">CATEGORIE</th>
						<th class="column-10">INZENDINGEN</th>
						<th class="column-10">BEDRAG</th>
					</tr>
				</thead>

				<tbody>
					@foreach($contests as $contest)
					<?php 
						// Compares expires_at with the current time
						$now = new DateTime();
						$future_date = new DateTime($contest->expires_at);

						$interval = $future_date->diff($now);

						$enddate = $interval->format("%a dagen, %h uren, %i minuten");

						// if current time is higher than expiration date set contest to finished.
						if($now > $future_date) {
							$enddate = 'Beëindigd';
						}

					?>
						<tr>
							{{-- link naar single page met de id van deze contest --}}
							<td class="column-40">{{ HTML::link_to_route('contest', $contest->title, $contest->id, array('class' => 'cat')) }}</td>
							<td class="column-20">{{ $enddate }}</td>
							<td class="column-10">{{ $contest->category }}</td>
							<td class="column-10">{{ Entry::where('contest_id', '=', $contest->id)->count() }}</td>
							<td class="column-10">&#128; {{ $contest->budget }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</section>
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