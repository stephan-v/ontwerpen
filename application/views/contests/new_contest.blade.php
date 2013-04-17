@layout('master')

@section('content')
	{{ Form::open() }}

		{{ Form::label('categorie', 'Selecteer een categorie') }}
		{{ Form::select('size', array('logo' => 'Logo', 'website' => 'Website', 'huisstijl' => 'Huisstijl', )) }}

		{{ Form::label('titel', 'Titel van de wedstrijd')}}
		{{ Form::text('titel', '', array('placeholder' => 'Geef een titel op'))}}

		{{ Form::label('omschrijving', 'Wedstrijd omschrijving')}}
		{{ Form::text('omschrijving', '', array('placeholder' => 'Omschrijf uw wedstrijd'))}}

		{{ Form::submit('Ga naar stap 2') }}

	{{ Form::close() }}
@endsection