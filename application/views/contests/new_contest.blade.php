@layout('master')

@section('content')

	<h1>Maak een nieuwe wedstrijd aan!</h1>

	{{ Form::open() }}

		{{ Form::label('category', 'Selecteer een categorie') }}
		{{ Form::select('category', array('logo' => 'Logo', 'website' => 'Website', 'huisstijl' => 'Huisstijl', )) }}

		{{ Form::label('title', 'Titel van de wedstrijd')}}
		{{ Form::text('title', '', array('placeholder' => 'Geef een titel op'))}}

		{{ Form::label('description', 'Wedstrijd omschrijving')}}
		{{ Form::textarea('description', '', array('placeholder' => 'Omschrijf uw wedstrijd'))}}

		{{ Form::label('budget', 'Wedstrijd budget')}}
		{{ Form::text('budget', '', array('placeholder' => 'Geef een budget op voor uw wedstrijd'))}}

		{{ Form::submit('Ga naar stap 2') }}

	{{ Form::close() }}

	<ul class="validation-errors">
		@foreach($errors->all() as $error)
			<li class="validation-error">{{ $error }}</li>
		@endforeach
	</ul>

@endsection