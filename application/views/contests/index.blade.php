@layout('master')

@section('content')

	<div class="contests-actions">
		<div class="company">
			{{ HTML::link('bedrijf', 'Ik ben een bedrijf op zoek naar een winnend ontwerp.') }}
		</div>
		<div class="designer">
			{{ HTML::link('ontwerper', 'Ik ben een ontwerper die mee wil doen aan ontwerpwedstrijden.') }}
		</div>
	</div>
	
		<section class="contests-table">
			@include('table')
		</section>
		
		<aside class="category-filter">
			<h1>Categorieen</h1>
			<ul class="section-box">
				<!-- categoriefilter, geef als derde argument de database category naam aan -->
				<li><div class="filter-icon all"></div>{{ HTML::link_to_route('contests', 'Alle Designs') }}</li>
				<li><div class="filter-icon logo"></div>{{ HTML::link_to_route('filter', 'Logo Designs', 'logo') }}</li>
				<li><div class="filter-icon website"></div>{{ HTML::link_to_route('filter', 'Website Designs', 'website') }}</li>
				<li><div class="filter-icon corporate"></div>{{ HTML::link_to_route('filter', 'Huisstijl Designs', 'huisstijl') }}</li>
			</ul>
		</aside>


@endsection