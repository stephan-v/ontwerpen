@layout('master')

@section('content')		

		<div id="form-header">Bewerk uw wedstrijd</div>

		{{ Form::open() }}

			{{ Form::label('title', 'Titel van de wedstrijd') }}
			{{ Form::text('title', $contest->title, array('placeholder' => 'Geef een titel op')) }}

			{{ Form::label('description', 'Wedstrijd omschrijving') }}
			{{ Form::textarea('description', $contest->description, array('placeholder' => 'Omschrijf uw wedstrijd')) }}

			{{ Form::submit('Update wedstrijd') }}

			<p>{{ Session::get('message') }}</p>

		{{ Form::close() }}

@endsection