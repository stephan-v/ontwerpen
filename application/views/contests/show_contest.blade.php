@layout('master')

@section('content')

	<h1>{{ $title }}</h1>

	<p class="startdate">Begin wedstrijd: {{ $startdate }}</p>
	<p class="enddate">Einde wedstrijd: {{ $enddate }}</p>

	<h2>Briefing:</h2>
	<p>{{ nl2br($description) }}</p>


	<h2>Inzendingen:</h2>
	<!-- ul class om alle entries te laten -->
	<ul class="contest-entries">
		<?php $i = 1; ?>		
		@foreach($entries as $entry)
		<?php echo $num = Entry::find($entry->id)->rating; ?>
			@if($i % 4 == 0)
			<li class="entry-item last">
			@else
			<li class="entry-item">
			@endif
				<a href="http://ontwerpwedstrijden.dev/uploads/{{ $entry->filename }}" class="preview"><img src="http://ontwerpwedstrijden.dev/uploads/{{ $entry->filename }}" /></a>
				<p>Ontwerper: {{ HTML::link_to_route('user', User::find($entry->user_id)->username, array(User::find($entry->user_id)->id)) }}</p>
				
				<section class="rating">
					<input type="radio" class="radio twenty" name="progress-<?php echo $i; ?>" value="twenty" id="twenty-<?php echo $i; ?>" <?php if($num === 1) { echo 'checked'; } ?>>
					<label for="twenty-<?php echo $i; ?>" class="label">1</label>

					<input type="radio" class="radio fourty" name="progress-<?php echo $i; ?>" value="fourty" id="fourty-<?php echo $i; ?>" <?php if($num === 2) { echo 'checked'; } ?>>
					<label for="fourty-<?php echo $i; ?>" class="label">2</label>

					<input type="radio" class="radio sixty" name="progress-<?php echo $i; ?>" value="sixty" id="sixty-<?php echo $i; ?>" <?php if($num === 3) { echo 'checked'; } ?>>
					<label for="sixty-<?php echo $i; ?>" class="label">3</label>

					<input type="radio" class="radio eighty" name="progress-<?php echo $i; ?>" value="eighty" id="eighty-<?php echo $i; ?>"<?php if($num === 4) { echo 'checked'; } ?>>
					<label for="eighty-<?php echo $i; ?>" class="label">4</label>

					<input type="radio" class="radio onehundred" name="progress-<?php echo $i; ?>" value="onehundred" id="onehundred-<?php echo $i; ?>" <?php if($num === 5) { echo 'checked'; } ?>>
					<label for="onehundred-<?php echo $i; ?>" class="label">5</label>

					<div class="progress">
					 	<div class="progress-bar"></div>
					</div>
				</section>

			</li>
			<?php $i++; ?>
		@endforeach
	</ul>

	@if(Auth::check())
		{{ HTML::link_to_route('new_entry', 'Voeg een inzending toe', $contest_id, array('class' => 'btn btn-entry')) }}
	@endif

@endsection