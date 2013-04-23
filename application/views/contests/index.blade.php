@layout('master')

@section('content')
	<h1>Wedstrijden</h1>
	<table>
		<thead>
			<tr>
				<th class="column-40">WEDSTRIJDNAAM</th>
				<th class="column-20">EINDDATUM</th>
				<th class="column-20">CATEGORIE</th>
				<th class="column-20">INZENDINGEN</th>
			</tr>
		</thead>

		<tbody>
			@foreach($contests as $contest)
				<tr>
					<!-- link naar single page met de id van deze contest -->
					<td class="column-40">{{ HTML::link_to_route('contest', $contest->title, $contest->id, array('class' => 'cat')) }}</td>
					<td class="column-20">{{ $contest->expires_at }}</td>
					<td class="column-20">{{ $contest->category }}</td>
					<td class="column-20">{{ Entry::where('contest_id', '=', $contest->id)->count() }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection