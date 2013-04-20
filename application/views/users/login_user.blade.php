@layout('master')

@section('content')
	<h1>Login</h1>
	{{ Form::open() }}

		{{ Form::label('email', 'Your email')}}
		{{ Form::text('email') }}

		{{ Form::label('password', 'Your password') }}
		{{ Form::password('password') }}

		{{ Form::submit('login') }}

	{{ Form::close() }}

	<ul class="validation-errors">
		@foreach($errors->all() as $error)
			<li class="validation-error">{{ $error }}</li>
		@endforeach
	</ul>

@endsection