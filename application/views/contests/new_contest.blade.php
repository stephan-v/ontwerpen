@layout('master')

@section('content')

	@if(isset($login_status))
		{{ $login_status }}
	@else

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

		{{ Form::label('enddate', 'Kies eind datum') }}
		{{ Form::select('enddate', array('1week' => '1 Week (Min)', '2week' => '2 Weken', '3week' => '3 Weken', '4week' => '4 Weken', '5week' => '5 Weken', '6week' => '6 Weken (Max)')) }}

		{{ Form::submit('Ga naar stap 2') }}

	{{ Form::close() }}

	<ul class="validation-errors">
		@foreach($errors->all() as $error)
			<li class="validation-error">{{ $error }}</li>
		@endforeach
	</ul>

	@endif

@endsection