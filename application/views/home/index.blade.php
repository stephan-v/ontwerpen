@layout('master')

@section('banner')
	<div class="main-banner">
		<div class="container">
			<h1 class="homepage-marketing-heading">Snelle en Goedkope Creative Diensten - {{ HTML::link('hoe-werkt-het', 'bekijk hoe het werkt') }}</h1>
			<div class="homepage-mast-actions">
				{{ HTML::link_to_route('contests', 'Bekijk de wedstrijden', '', array('class' => 'btn-entry')) }} - 
				{{ HTML::link_to_route('new_contest', 'Maak een wedstrijd aan', '', array('class' => 'btn-entry')) }}
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="header"></div>
	<section class="welcome section-box">	
	<h1>Heeft u een logo of ander grafisch ontwerp nodig?</h1>
		<p>Creatief talent is overal. Via ons platform geven we creatieven van allerlei disciplines en achtergronden de kans om aansprekende content te maken voor hun favoriete merken.</p>

		<p>Op ons platform zetten we creatieve opdrachten van merken uit waar jij als creatief talent je gratis op in kunt schrijven. Je bepaalt zelf aan welke opdrachten je meedoet, wat je instuurt en met wie je samenwerkt. Door mee te doen doe je ervaring op, bouw je aan een steengoed portfolio, vergroot je je netwerk en verdien je geld.</p>

		<p>Brandfighters is dé plek om jezelf te profileren als creatieve specialist, je professionele netwerk te vergroten en door te groeien als creatieve professional. Zo geef je je creatieve carrière een flinke boost! {{ HTML::link('hoe-werkt-het', 'Lees hier hoe het werkt.')}}</p>
	</section>

	@include('table')

@endsection