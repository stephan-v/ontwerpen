@layout('master')

@section('content')

	<section class="section-header header-designer"></section>
	<section class="section-box no-border">
		<h2>Tips voor Ontwerpers.</h2>
		<p>Natuurlijk wilt u als ontwerper een zo goed mogelijk ontwerp neerzetten. Daarom hebben wij hier nog wat tips voor u.</p>
		<ul class="large-list">
			<li>Neem je tijd om de briefing goed door te lezen en eventueel vragen te stellen via de commentaar sectie, dit kan je veel moeite besparen voordat je aan de slag gaat met de wedstrijd.</li>
			<li>Alhoewel elke wedstrijd maar één winnaar kan hebben is microlancer ongetwijfeld een goede omgeving om werkervaring op te doen en een portfolio op te bouwen ongeacht of je inzending in de prijzen valt.</li>
			<li>Gebruik geen stock fotografie, afbeeldingen, etc. tenzij je daadwerkelijk hiervoor de rechten hebt verkregen.</li>
		</ul>
		{{ HTML::link_to_route('contests', 'Bekijk de wedstrijden', '', array('class' => 'btn-entry')) }}
	</section>
	
@endsection