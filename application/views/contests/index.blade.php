@layout('master')

@section('content')

	<div class="contests-actions">
		<div class="company">
			{{ HTML::link('bedrijf', 'Ik ben een bedrijf op zoek naar een winnend ontwerp.') }}
		</div>
		<div class="designer">
			{{ HTML::link('ontwerper', 'Ik ben een ontwerper die mee wil doen aan ontwerpwedstrijden.') }}
		</div>
	</div>
	
	<section class="contests">
		<section class="contests-table">
			<h1>Wedstrijden</h1>
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
		
		<aside class="category-filter">
			<h1>Categorieen</h1>
			<ul class="section-box">
				<!-- categoriefilter, geef als derde argument de database category naam aan -->
				<li><div class="filter-icon all"></div>{{ HTML::link_to_route('contests', 'Alle Designs') }}</li>
				<li><div class="filter-icon logo"></div>{{ HTML::link_to_route('filter', 'Logo Designs', 'logo') }}</li>
				<li><div class="filter-icon website"></div>{{ HTML::link_to_route('filter', 'Website Designs', 'website') }}</li>
				<li><div class="filter-icon corporate"></div>{{ HTML::link_to_route('filter', 'Huisstijl Designs', 'huisstijl') }}</li>
			</ul>
		</aside>
	</section>

@endsection