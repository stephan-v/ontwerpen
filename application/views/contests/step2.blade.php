@layout('master')

@section('content')

	@if(isset($login_status))
		{{ $login_status }}
	@else

		<div id="form-header" class="describe-contest">Adresgegevens</div>

		{{ Form::open('contests/new/step-2', 'POST', array('class' => 'describe-contest')) }}

			{{ Form::label('firstname', 'Voornaam') }}
			{{ Form::text('firstname', Input::old('firstname'), array('placeholder' => 'Geef uw voornaam op')) }}
			{{ $errors->has('firstname') ? '<span class="validation-error">' . $errors->first('firstname') . '</span>' : '' }}

			{{ Form::label('lastname', 'Achternaam') }}
			{{ Form::text('lastname', Input::old('lastname'), array('placeholder' => 'Geef uw achternaam op')) }}
			{{ $errors->has('lastname') ? '<span class="validation-error">' . $errors->first('lastname') . '</span>' : '' }}

			{{ Form::label('company', 'Bedrijfsnaam') }}
			{{ Form::text('company', Input::old('company'), array('placeholder' => 'Uw bedrijfsnaam')) }}
			{{ $errors->has('company') ? '<span class="validation-error">' . $errors->first('company') . '</span>' : '' }}

			{{ Form::label('address', 'Adres') }}
			{{ Form::text('address', Input::old('address'), array('placeholder' => 'Geef uw adres op')) }}
			{{ $errors->has('address') ? '<span class="validation-error">' . $errors->first('address') . '</span>' : '' }}

			{{ Form::label('postalcode', 'Postcode') }}
			{{ Form::text('postalcode', Input::old('postalcode'), array('placeholder' => 'Geef uw postcode op')) }}
			{{ $errors->has('postalcode') ? '<span class="validation-error">' . $errors->first('postalcode') . '</span>' : '' }}

			{{ Form::label('city', 'Woonplaats') }}
			{{ Form::text('city', Input::old('city'), array('placeholder' => 'Geef uw woonplaats op')) }}
			{{ $errors->has('city') ? '<span class="validation-error">' . $errors->first('city') . '</span>' : '' }}

			{{ Form::label('phonenumber', 'Telefoonnummer') }}
			{{ Form::text('phonenumber', Input::old('phonenumber'), array('placeholder' => 'Geef uw telefoonnummer op')) }}
			{{ $errors->has('phonenumber') ? '<span class="validation-error">' . $errors->first('phonenumber') . '</span>' : '' }}

			{{ Form::label('taxnumber', 'BTW nummer') }}
			{{ Form::text('taxnumber', Input::old('taxnumber'), array('placeholder' => 'Geef uw BTW. nummer op')) }}
			{{ $errors->has('taxnumber') ? '<span class="validation-error">' . $errors->first('taxnumber') . '</span>' : '' }}

			{{ Form::submit('Ga naar stap 3') }}

		{{ Form::close() }}

		<aside class="contest-help">
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