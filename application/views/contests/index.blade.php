@layout('master')

@section('content')
	<h1>Wedstrijden</h1>
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
@endsection


