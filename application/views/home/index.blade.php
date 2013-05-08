@layout('master')

@section('banner')
	<div id="main-banner">
		<div class="container">
			<h1 class="homepage-marketing-heading">Snelle en Goedkope Creative Diensten - {{ HTML::link('hoe-werkt-het', 'bekijk hoe het werkt') }}</h1>
			<div class="homepage-mast-actions">
				<div class="btn left">{{ HTML::link_to_route('contests', 'Bekijk de wedstrijden') }}</div>
				<div class="btn right second-btn">{{ HTML::link_to_route('new_contest', 'Maak een wedstrijd aan') }}</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<h1>Welkom op microlancer.nl</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean in auctor mi. Morbi luctus purus elit. In porta nunc id dui hendrerit egestas. Donec nisl dui, dapibus at facilisis id, egestas ut lectus. Vivamus tristique mattis viverra. Quisque eu nunc quis tortor egestas pretium at quis tellus. Integer congue adipiscing tellus eu lacinia. Aenean id orci id tortor pretium viverra. Phasellus suscipit consectetur sapien. Nullam tortor neque, volutpat at aliquet sit amet, feugiat quis est. Morbi nec nisi in libero fringilla tincidunt.</p>

	<p>Duis congue scelerisque varius. Curabitur sit amet libero id risus ultricies sodales. Sed ac diam felis, at tristique urna. Etiam sem lectus, porttitor sit amet egestas sit amet, pretium ac diam. Donec tellus felis, volutpat eget rutrum et, rutrum ut diam. Ut urna libero, lobortis pretium tincidunt a, aliquam at massa. Phasellus nec eros eget nibh accumsan iaculis. Suspendisse nec condimentum libero. Duis eu magna ut nibh blandit pellentesque. In auctor lectus non eros aliquet suscipit. Nunc euismod urna sed eros congue consectetur. In nulla risus, adipiscing at dictum et, imperdiet vel velit. Donec nunc ante, malesuada sed eleifend id, ornare et magna. Maecenas rhoncus semper risus, et tincidunt felis ultrices eget.</p>
@endsection