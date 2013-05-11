@layout('master')

@section('content')

	@if(isset($login_status))
		{{ $login_status }}
	@else

		<div id="form-header" class="describe-contest">Omschrijf uw wedstrijd</div>

		{{ Form::open('contests/new', 'POST', array('class' => 'describe-contest')) }}

			{{ Form::label('category', 'Selecteer een categorie') }}
			{{ Form::select('category', array('logo' => 'Logo', 'website' => 'Website', 'huisstijl' => 'Huisstijl', )) }}

			{{ Form::label('title', 'Titel van de wedstrijd')}}
			{{ Form::text('title', Input::old('title'), array('placeholder' => 'Geef een titel op'))}}
			{{ $errors->has('title') ? '<span class="validation-error">' . $errors->first('title') . '</span>' : '' }}

			{{ Form::label('description', 'Wedstrijd omschrijving')}}
			{{ Form::textarea('description', Input::old('description'), array('placeholder' => 'Omschrijf uw wedstrijd'))}}
			{{ $errors->has('description') ? '<span class="validation-error">' . $errors->first('description') . '</span>' : '' }}

			{{ Form::label('budget', 'Wedstrijd budget')}}
			{{ Form::text('budget', Input::old('budget'), array('placeholder' => 'Geef een budget op voor uw wedstrijd'))}}
			@foreach($errors->get('budget', '<span class="validation-error">:message</span>') as $error)
				{{ $error }}
			@endforeach

			{{ Form::label('enddate', 'Kies eind datum') }}
			{{ Form::select('enddate', array('1week' => '1 Week (Min)', '2week' => '2 Weken', '3week' => '3 Weken', '4week' => '4 Weken', '5week' => '5 Weken', '6week' => '6 Weken (Max)')) }}

			{{ Form::submit('Ga naar stap 2') }}

		{{ Form::close() }}

		<aside>
			<p>Geef een duidelijk omschrijving van uw wedstrijd. In uw titel kunt u nogmaals aangeven welke categorie de wedstrijd betreft en om wat voor specifieke dienst het gaat.</p>
			<p>In uw omschrijving is het vaak handig een aantal zaken bijlangs te gaan:</p>
			<ul>
				<li>Beschrijf uw wensen</li>
				<li>Omschrijf uw doelgroep</li>
				<li>De stijl wat u aanspreekt (Retro, Modern, kleuren)</li>
				<li>Waar heeft u het ontwerp voor nodig? Website, auto belettering, drukwerk ect...</li>
			</ul>
		</aside>

	@endif

@endsection