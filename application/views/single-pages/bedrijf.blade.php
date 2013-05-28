@layout('master')

@section('content')
	
	<section class="section-header header-company"></section>
	<section class="section-box no-border">
		<h2>Tips voor bedrijven.</h2>
		<p>Natuurlijk wilt u een zo goed mogelijk ontwerp voor de prijs die u in gedachte heeft. Daarom hebben wij hier nog wat tips voor u.</p>
		<ul class="large-list">
			<li>Wij proberen de beste prijs/kwaliteits verhouding te waarborgen. Toch moet u zich er van bewust zijn dat er meer ontwerpers zullen reageren wanneer de prijs voor u wedstrijd hoger ligt en hierdoor de kwaliteit over het algemeen zal verbeteren.</li>
			<li>Communiceer regelmatig met uw ontwerpers. Door feedback to geven op ontwerpen kunnen ontwerpers hun bestaande inzendingen verbeteren en aanpassen aan uw wensen voor het beste eindproduct.</li>
			<li>Promoot uw website via social media en vraag naasten om hun mening. Het is belangrijk om de missie en visie van uw bedrijf/instelling in gedachte te houden en niet alleen uw persoonlijke voorkeur zodat ontwerpers een grafische representatie van uw bedrijf/instellingen maken en niet van u zelf.</li>
		</ul>
		{{ HTML::link_to_route('new_contest', 'Maak een wedstrijd aan', '', array('class' => 'btn-entry')) }}
	</section>

@endsection