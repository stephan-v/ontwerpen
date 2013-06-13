@layout('master')

@section('content')

	<!-- Check if it's the users first time logging in, if so display modal window. Change to 0 to view and test the modal window. -->
	@if($user->firsttime == 1)
		<div id="dialog">
			<div class="checkmark"></div>
			<h2>Geweldig!</h2>
			<p>Je bent ingelogd en klaar om microlancer voor het eerst te gebruiken.</p>
			<p>Voordat we beginnen is het misschien handig om nog even wat dingen te weten.</p> 
			<ul>
				<li>Wanneer u ingelogd bent kunt u toegang krijgen tot u profiel(deze pagina) door rechtsbovenin op uw gebruikersnaam te klikken.</li>
				<li>Zodra u een wedstrijd heeft aangemaakt zal deze op uw profielpagina te zien zijn. Hier kunt u de wedstrijdinformatie tevens ook bijwerken.</li>
				<li>Zodra u een inzending voor een wedstrijd heeft geplaatst zal deze hier ook verschijnen, samen met al u andere eventuele inzendingen.</li>
			</ul>
		</div>

		<!-- Set the firsttime var to 0 indicating that the user has logged in for the first time -->
		<?php $user->firsttime = 0; ?>
		<?php $user->save(); ?>
	@endif

	@include('profile')

	<section class="testcontent">
		<h2>Mijn Profiel</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, incidunt deleniti asperiores tempore error architecto! Vitae, veritatis, cumque labore in autem numquam cum dolore consectetur et officiis quis repellendus error.</p>

		<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, laudantium, doloribus delectus qui dignissimos alias ipsam ut id excepturi officiis minima eius autem veniam necessitatibus maiores inventore blanditiis aliquid expedita.</p>
	</section>

	{{-- If user has contests, display contests header and all user contests --}}
	@if( !empty($contests) )
		<section class="contests">
			<h1>Mijn wedstrijden</h1>
			<table>
				<thead>
					<tr>
						<th class="column-40">Wedstrijdnaam</th>
						<th class="column-20">Bewerken</th>
						<th class="column-10">Voeg bestanden toe</th>
						<th class="column-10">Inzendingen</th>
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
							<td class="column-20">{{ HTML::link_to_route('edit_contest', 'Bewerken', $contest->id, array('class' => 'btn-entry')) }}</td>
							<td class="column-20">Binnenkort te gebruiken</td>
							<td class="column-10">{{ Entry::where('contest_id', '=', $contest->id)->count() }}</td>							
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
				<h2>Mijn inzendingen</h2>
			</div>
			<!-- ul class om alle entries te laten -->
			<ul class="contest-entries">
				<?php $i = 1; ?>
				@foreach($entries as $entry)
					@if($i % 4 == 0)
					<div class="entry-item last">
					@else
					<div class="entry-item">
					@endif

						<a href="{{ URL::base() }}/contests/{{ $entry->contest_id }}" class="preview">
							<img src="{{ URL::base() }}/thumbnails/{{ $entry->filename }}" />
						</a>
						
						<div class="entry-info">
							<div class="delete-entry">
								<!-- laat alleen de mogelijkheden deleten, bewerken en rapporteren van entries zien wanneer ingelogd. -->
								@if(Auth::check())
									<ul class="options-entry">
										<!-- laat alleen de mogelijkheden deleten en bewerken zien wanneer de eigenaar van deze entry is ingelogd -->
										@if( isset(Auth::user()->username) )
											@if( Auth::user()->username === User::find($entry->user_id)->username)
												<li><p class="delete">Delete</p></li>
												<li><p>Bewerk</p></li>
											@endif
												<li><p>Rapporteer</p></li>
										@endif
									</ul>
								@endif
							</div>					

							<span class="id-number">#{{ $entry->id }}</span>

							<p>Ontwerper: {{ HTML::link_to_route('user', User::find($entry->user_id)->username, array(User::find($entry->user_id)->id)) }}</p>

							<section class="rating">
								<?php $displaystatus = 'display:none'; ?>

								<input type="radio" class="radio twenty" name="progress-{{ $i }}" value="1" id="twenty-{{ $i }}" <?php if($entry->rating == 1) { echo 'checked'; } ?>>
								<label for="twenty-<?php echo $i; ?>" class="label" style="{{ $displaystatus }}">1</label>

								<input type="radio" class="radio fourty" name="progress-{{ $i }}" value="2" id="fourty-{{ $i }}" <?php if($entry->rating == 2) { echo 'checked'; } ?>>
								<label for="fourty-<?php echo $i; ?>" class="label" style="{{ $displaystatus }}">2</label>

								<input type="radio" class="radio sixty" name="progress-{{ $i }}" value="3" id="sixty-{{ $i }}" <?php if($entry->rating == 3) { echo 'checked'; } ?>>
								<label for="sixty-<?php echo $i; ?>" class="label" style="{{ $displaystatus }}">3</label>

								<input type="radio" class="radio eighty" name="progress-{{ $i }}" value="4" id="eighty-{{ $i }}"<?php if($entry->rating == 4) { echo 'checked'; } ?>>
								<label for="eighty-<?php echo $i; ?>" class="label" style="{{ $displaystatus }}">4</label>

								<input type="radio" class="radio onehundred" name="progress-{{ $i }}" value="5" id="onehundred-{{ $i }}" <?php if($entry->rating == 5) { echo 'checked'; } ?>>
								<label for="onehundred-<?php echo $i; ?>" class="label" style="{{ $displaystatus }}">5</label>

								<div class="progress">
								 	<div class="progress-bar"></div>
								</div>
							</section>

						</div><!-- end entry info -->

					</div>
					<?php $i++; ?>
				@endforeach
			</ul>
		</section>
	@endif
	
@endsection