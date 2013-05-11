@layout('master')

@section('content')

	@if(isset($login_status))
		{{ $login_status }}
	@else

		<div id="form-header" class="describe-contest">Stap 3</div>

		{{ Form::open('contests/new/', 'POST', array('class' => 'describe-contest')) }}

			{{ Form::label('firstname', 'Voornaam') }}
			{{ Form::text('firstname', '', array('placeholder' => 'Geef uw voornaam op')) }}

			{{ Form::label('lastname', 'Achternaam') }}
			{{ Form::text('lastname', '', array('placeholder' => 'Geef uw achternaam op')) }}

			{{ Form::label('company', 'Bedrijfsnaam') }}
			{{ Form::text('company', '', array('placeholder' => 'Uw bedrijfsnaam')) }}

			{{ Form::label('address', 'Adres') }}
			{{ Form::text('address', '', array('placeholder' => 'Geef uw adres op')) }}

			{{ Form::label('postalcode', 'Postcode') }}
			{{ Form::text('postalcode', '', array('placeholder' => 'Geef uw postcode op')) }}

			{{ Form::label('city', 'Stad') }}
			{{ Form::text('city', '', array('placeholder' => 'Geef uw stad op')) }}

			{{ Form::label('phonenumber', 'Telefoonnummer') }}
			{{ Form::text('phonenumber', '', array('placeholder' => 'Geef uw telefoonnummer op')) }}

			{{ Form::label('taxnumber', 'BTW nummer') }}
			{{ Form::text('taxnumber', '', array('placeholder' => 'Geef uw BTW. nummer op')) }}

			<input type="hidden" id="step" name="step" value="3" />

			{{ Form::submit('Ga naar stap 3') }}

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