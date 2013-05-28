@layout('master')

@section('banner')
	<div class="main-banner">
		<div class="container">
			<h1 class="homepage-marketing-heading">Snelle en Goedkope Creative Diensten - {{ HTML::link('hoe-werkt-het', 'bekijk hoe het werkt') }}</h1>
			<div class="homepage-mast-actions">
				{{ HTML::link_to_route('contests', 'Bekijk de wedstrijden', '', array('class' => 'btn-entry')) }} - 
				{{ HTML::link_to_route('new_contest', 'Maak een wedstrijd aan', '', array('class' => 'btn-entry')) }}
			</div>
		</div>
	</div>
@endsection

@section('content')
	<h1>Welkom op microlancer.nl</h1>
	<p>Microlancer is het platform voor creatieve content.</p>

	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean in auctor mi. Morbi luctus purus elit. In porta nunc id dui hendrerit egestas. Donec nisl dui, dapibus at facilisis id, egestas ut lectus. Vivamus tristique mattis viverra. Quisque eu nunc quis tortor egestas pretium at quis tellus. Integer congue adipiscing tellus eu lacinia. Aenean id orci id tortor pretium viverra. Phasellus suscipit consectetur sapien. Nullam tortor neque, volutpat at aliquet sit amet, feugiat quis est. Morbi nec nisi in libero fringilla tincidunt.</p>

	<p>Duis congue scelerisque varius. Curabitur sit amet libero id risus ultricies sodales. Sed ac diam felis, at tristique urna. Etiam sem lectus, porttitor sit amet egestas sit amet, pretium ac diam. Donec tellus felis, volutpat eget rutrum et, rutrum ut diam. Ut urna libero, lobortis pretium tincidunt a, aliquam at massa. Phasellus nec eros eget nibh accumsan iaculis. Suspendisse nec condimentum libero. Duis eu magna ut nibh blandit pellentesque. In auctor lectus non eros aliquet suscipit. Nunc euismod urna sed eros congue consectetur. In nulla risus, adipiscing at dictum et, imperdiet vel velit. Donec nunc ante, malesuada sed eleifend id, ornare et magna. Maecenas rhoncus semper risus, et tincidunt felis ultrices eget.</p>

	<section class="contests main">
		<h1>Laatste wedstrijden</h1>
		<table>
			<thead>
				<tr>
					<th class="column-40">Wedstrijdnaam</th>
					<th class="column-20">Eindigt over</th>
					<th class="column-10">Categorie</th>
					<th class="column-10">Inzendingen</th>
					<th class="column-10">Bedrag</th>
				</tr>
			</thead>

			<tbody>
				@foreach($contests as $contest)
					<?php 
						// Compares expires_at with the current time
						$now = new DateTime();
						$future_date = new DateTime($contest->expires_at);

						$interval = $future_date->diff($now);					

						// if current time is higher than expiration date set contest to finished.
						if($now > $future_date) {
							$enddate = 'Beëindigd';
						} elseif($interval->m <= 1) {
							$enddate = $interval->format("%a dagen");
						} elseif($interval->d <= 1) {
							$enddate = $interval->format("%a dagen, %i minuten");
						} elseif($interval->h <= 23) {
							$enddate = $interval->format("%h uur, %i minuten");
						}
					?>
					<tr>
						<!-- link naar single page met de id van deze contest -->
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

@endsection