@layout('master')

@section('content')

	<section id="contest-details">
		<h1>{{ $title }}</h1>
		<p class="startdate">Begin wedstrijd: {{ $startdate }}</p>
		<p class="enddate">Einde wedstrijd: {{ $enddate }}</p>
		<p>Wedstrijd aangemaakt door:</p>
	</section>

	<section id="contest-briefing">
		<h2>Briefing:</h2>
		<p>{{ nl2br($description) }}</p>
	</section>

	<section id="entries">
		<div class="entries-header">
			<h2>Inzendingen</h2>
		</div>
		<!-- ul class om alle entries te laten -->
		<ul class="contest-entries">
			<?php $i = 1; ?>		
			@foreach($entries as $entry)
			<?php $num = Entry::find($entry->id)->rating; ?>
				@if($i % 4 == 0)
				<li class="entry-item last" id="{{ $entry->id }}">
				@else
				<li class="entry-item" id="{{ $entry->id }}">
				@endif
					<a href="http://ontwerpwedstrijden.dev/uploads/{{ $entry->filename }}" class="preview"><img src="http://ontwerpwedstrijden.dev/uploads/{{ $entry->filename }}" /></a>
					<p>Ontwerper: {{ HTML::link_to_route('user', User::find($entry->user_id)->username, array(User::find($entry->user_id)->id)) }}</p>
					
					<section class="rating">
						{{-- If the logged in user is not the owner of the contest hide the ratinglabels --}}
						@if( isset(Auth::user()->username) != $contest_owner)
							<?php $displaystatus = 'display:none'; ?>
						@else
							<?php $displaystatus = 'display:inline-block'; ?>
						@endif

						<input type="radio" class="radio twenty" name="progress-{{ $i }}" value="1" id="twenty-{{ $i }}" <?php if($num === 1) { echo 'checked'; } ?>>
						<label for="twenty-<?php echo $i; ?>" class="label" style="{{ $displaystatus }}">1</label>

						<input type="radio" class="radio fourty" name="progress-{{ $i }}" value="2" id="fourty-{{ $i }}" <?php if($num === 2) { echo 'checked'; } ?>>
						<label for="fourty-<?php echo $i; ?>" class="label" style="{{ $displaystatus }}">2</label>

						<input type="radio" class="radio sixty" name="progress-{{ $i }}" value="3" id="sixty-{{ $i }}" <?php if($num === 3) { echo 'checked'; } ?>>
						<label for="sixty-<?php echo $i; ?>" class="label" style="{{ $displaystatus }}">3</label>

						<input type="radio" class="radio eighty" name="progress-{{ $i }}" value="4" id="eighty-{{ $i }}"<?php if($num === 4) { echo 'checked'; } ?>>
						<label for="eighty-<?php echo $i; ?>" class="label" style="{{ $displaystatus }}">4</label>

						<input type="radio" class="radio onehundred" name="progress-{{ $i }}" value="5" id="onehundred-{{ $i }}" <?php if($num === 5) { echo 'checked'; } ?>>
						<label for="onehundred-<?php echo $i; ?>" class="label" style="{{ $displaystatus }}">5</label>

						<div class="progress">
						 	<div class="progress-bar"></div>
						</div>
					</section>

				</li>
				<?php $i++; ?>
			@endforeach
		</ul>
	</section>

	@if(Auth::check())
		{{ HTML::link_to_route('new_entry', 'Voeg een inzending toe', $contest_id, array('class' => 'btn btn-entry')) }}
	@endif

@endsection