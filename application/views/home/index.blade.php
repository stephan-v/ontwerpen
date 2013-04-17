@layout('master')

@section('content')
	<h1 class="homepage-marketing-heading">Snelle en Goedkope Creative Diensten <a href="#">bekijk hoe het werkt</a></h1>
	<div class="homepage-mast-actions">
		{{ HTML::link_to_route('contests', 'Bekijk de wedstrijden', '', array('class' => 'btn')) }}
		{{ HTML::link_to_route('new_contest', 'Maak een wedstrijd aan', '', array('class' => 'btn')) }}
	</div>
@endsection