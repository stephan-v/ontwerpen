@layout('master')

@section('content')

	@include('profile')

	<section class="testcontent">
		<h1>Instelingen</h1>
		@if( Auth::user()->username === $user->username)

			<p>{{ Session::get('message') }}</p>

			{{ Form::open() }}

				{{ Form::label('username', 'Gebruikersnaam') }}
				{{ Form::text('username', $user->username, array('placeholder' => 'Geef uw gebruikersnaam op')) }}

				{{ Form::label('email', 'Email') }}
				{{ Form::text('email', $user->email, array('placeholder' => 'Geef uw email op')) }}

				{{ Form::label('firstname', 'Voornaam') }}
				{{ Form::text('firstname', $address->firstname, array('placeholder' => 'Geef uw voornaam op')) }}

				{{ Form::label('lastname', 'Achternaam') }}
				{{ Form::text('lastname', $address->lastname, array('placeholder' => 'Geef uw achternaam op')) }}

				{{ Form::label('company', 'Bedrijfsnaam') }}
				{{ Form::text('company', $address->company, array('placeholder' => 'Uw bedrijfsnaam')) }}

				{{ Form::label('address', 'Adres') }}
				{{ Form::text('address', $address->address, array('placeholder' => 'Geef uw adres op')) }}

				{{ Form::label('postalcode', 'Postcode') }}
				{{ Form::text('postalcode', $address->postalcode, array('placeholder' => 'Geef uw postcode op')) }}

				{{ Form::label('city', 'Stad') }}
				{{ Form::text('city', $address->city, array('placeholder' => 'Geef uw stad op')) }}

				{{ Form::label('phonenumber', 'Telefoonnummer') }}
				{{ Form::text('phonenumber', $address->phonenumber, array('placeholder' => 'Geef uw telefoonnummer op')) }}

				{{ Form::label('taxnumber', 'BTW nummer') }}
				{{ Form::text('taxnumber', $address->taxnumber, array('placeholder' => 'Geef uw BTW. nummer op')) }}

				{{ Form::submit('Update mijn gegevens') }}

				@foreach($errors->all('<span class="validation-error">:message</span>') as $error)
					{{ $error }}
				@endforeach

			{{ Form::close() }}
		@else
			<p>Sorry maar u kunt dit account niet bewerken.</p>
		@endif
	</section>

@endsection