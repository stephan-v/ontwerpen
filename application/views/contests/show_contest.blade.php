@layout('master')

@section('content')

	<div id="tabs">
		<ul>
			<li><a href="#briefing">Briefing</a></li>
			<li><a href="#entries">Inzendingen</a></li>
			<li><a href="#comments">Commentaar</a></li>
		</ul>
		<div id="briefing">
				@if( isset($winner) )
				<section id="contest-winner" class="section-box">	
					<div class="left">
						<h2>Wedstrijd eigenaar {{ $contest->owner }} heeft <span class="blue">{{ $contest->budget }}</span> euro betaald, 
						heeft <span class="blue">10</span> ontwerpen ontvangen
						van <span class="blue">4</span> gekwalificeerde ontwerpers.</h2>

						<h2>Wij willen graag de ontwerper {{ HTML::link_to_route('user', User::find($winner->user_id)->username, array(User::find($winner->user_id)->id)) }} feliciteren met het winnen van de eerste prijs!</h2>				
					</div>	
					<div class="right">
						<a href="http://ontwerpwedstrijden.dev/uploads/{{ $winner->filename }}" class="preview"><img src="http://ontwerpwedstrijden.dev/uploads/{{ $winner->filename }}" /></a>
					</div>
				</section>
			@endif

			<section id="contest-details" class="section-box">
				<h1>{{ $contest->title }}</h1>
				<p class="startdate">Begin wedstrijd: {{ $startdate }}</p>
				<p class="enddate">Einde wedstrijd: {{ $enddate }}</p>
				<p>Wedstrijd aangemaakt door: {{ $contest->owner }}</p>
			</section>

			<div class="contest-header"><h1>Briefing</h1></div>
			<section id="contest-briefing" class="section-box">
				<p>{{ nl2br($contest->description) }}</p>
			</section>
		</div><!-- end briefing -->

		<div id="entries">
			<section id="entries">
				
				<div class="entries-header">
					<h2>Inzendingen</h2>
				</div>

				<!-- ul class om alle entries te laten -->
				<ul class="contest-entries">
					<?php $i = 1; ?>		
					@foreach($entries as $entry)
						@if($i % 4 == 0)
						<div class="entry-item last" id="{{ $entry->id }}">
						@else
						<div class="entry-item" id="{{ $entry->id }}">
						@endif

						<a href="{{ URL::base() }}/uploads/{{ $entry->filename }}" class="preview">
							<img src="{{ URL::base() }}/uploads/{{ $entry->filename }}" />
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

								@if( $entry->winning_design )
									<div class="winning-design"></div>
								@endif					

								<p>Ontwerper: {{ HTML::link_to_route('user', User::find($entry->user_id)->username, array(User::find($entry->user_id)->id)) }}</p>
								
								<section class="rating">
									{{-- If the logged in user is not the owner of the contest hide the ratinglabels --}}
									@if( isset(Auth::user()->username) != $contest->owner)
										<?php $displaystatus = 'display:none'; ?>
									@else
										<?php $displaystatus = 'display:inline-block'; ?>
									@endif

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
							</div><!-- end entry-info -->

						</div>
						<?php $i++; ?>
					@endforeach
				</ul>

				@if(Auth::check())
					{{ HTML::link_to_route('new_entry', 'Voeg een inzending toe', $contest->id, array('class' => 'btn-entry upload')) }}
				@endif

			</section>
		</div><!-- end entries -->

		<div id="comments">
				<section class="comments">
				<div class="entries-header">
					<h2>Commentaar</h2>
				</div>

				<!-- alleen commentform laten zien als user ingelogd is -->
				@if(Auth::check())
					{{ Form::open() }}
						{{ Form::textarea('comment') }}
						{{ Form::submit('Toevoegen')}}
					{{ Form::close() }}
				@endif

				@foreach($comments as $comment)
					<div class="comment">
						<div class="comment-header">
							<div class="avatar">
								<img src="../img/default-avatar.png" style="width: 100%;">
							</div>
							<div class="user-info">
								<span class="author">
									{{ HTML::link_to_route('user', User::find($comment->user_id)->username, array(User::find($comment->user_id)->id)) }}
								</span>
								<span class="timestamp">
									{{ $comment->created_at }}
								</span>
							</div>
						</div>
						<div class="comment-body">
							<!-- Eventueel nl2br func toevoegen om de regels op te breken -->
							<p>{{ $comment->comment }}</p>
						</div>
					</div>
				@endforeach
			</section>	
		</div><!--end comments -->
	</div>

@endsection