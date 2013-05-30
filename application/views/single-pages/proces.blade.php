@layout('master')

@section('banner')
	<div class="main-banner process-banner">
		<h1>Een vloeiende samenwerking tussen bedrijven en ontwerpers in vier simpele stappen.</h1>
	</div>
	<div class="tomato-banner">
		<div class="container">
			<div class="twentyfive-width">
				<div class="process briefing"></div>
				<h2>Schrijf een briefing</h2>
				<p>Laat weten wat uw wensen zijn, en tevens ook wat u niet wilt zien. Gebruik voorbeelden en geef duidelijk aan wat de opdracht is.</p>
			</div>
			<div class="twentyfive-width">
				<div class="process creatief"></div>
				<h2>Designers strijden</h2>
				<p>Vervolgens zullen onze ontwerpers aan de hand van uw briefing inzendingen plaatsen die u kan beoordelen.</p>
			</div>
			<div class="twentyfive-width">
				<div class="process beheer"></div>
				<h2>Beheer uw wedstrijd</h2>
				<p>Communiceer met ontwerpers, geef feedback en beoordeel inzendingen voor het beste eindresultaat.</p>
			</div>
			<div class="twentyfive-width">
				<div class="process winnaar"></div>
				<h2>Kies een winnaar</h2>
				<p>Kies het ontwerp dat het beste voldoet aan uw wensen uit de inzendingen en benoem deze tot winnaar.</p>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<section class="section-box">
		<h1>Bedrijven/Instellingen</h1>
		<ul class="large-list">
			<li>Bepaal zelf uw prijs.</li>
			<li>Niet goed, geld terug garantie.</li>
			<li>Makkelijke communicatie met ontwerpers</li>
			<li>Keuze uit groot scala van ontwerpen</li>
			<li>Ontvang de bestanden en de bijbehorende rechten.</li>
			<li>Geen kosten achteraf.</li>
		</ul>
		{{ HTML::link_to_route('new_contest', 'Maak een wedstrijd aan', '', array('class' => 'btn-entry')) }}
	</section>

	<section class="section-box">
		<h1>Ontwerpers</h1>
		<ul class="large-list">
			<li>Praktijkervaring verkrijgen op een constructieve manier.</li>
			<li>Makkelijk portfolio opbouwen.</li>
			<li>Communiceren met echte opdrachtgevers.</li>
			<li>Mooie manier om geld te verdienen.</li>
		</ul>
		{{ HTML::link_to_route('contests', 'Bekijk de wedstrijden', '', array('class' => 'btn-entry')) }}
	</section>
@endsection