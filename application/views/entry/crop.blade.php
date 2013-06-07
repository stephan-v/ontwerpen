@layout('master')

@section('content')

<style>
	
	/* Apply these styles only when #preview-pane has
   been placed within the Jcrop widget */
.jcrop-holder #preview-pane {
  display: block;
  position: absolute;
  z-index: 2000;
  right: -280px;
  padding: 6px;
  background-color: white;
}

.jcrop-holder {
	margin-bottom: 20px;
}

/* The Javascript code will set the aspect ratio of the crop
   area based on the size of the thumbnail preview,
   specified here */
#preview-pane .preview-container {
  width: 200px;
  height: 150px;
  overflow: hidden;
}

.description {
	margin-top: 20px;
}

</style>

<div class="container">
<div class="row">
<div class="span12">
<div class="jc-demo-box">

	<div class="page-header">
		<h1>Afbeelding bijsnijden tot cover</h1>
	</div>

	<img src="../../../uploads/{{Session::get('filename')}}" id="target" alt="[Jcrop Example]" />

	<div id="preview-pane">
		<div class="preview-container">
			<img src="../../../uploads/{{Session::get('filename')}}" class="jcrop-preview" alt="Preview" />
		</div>
	</div>

	{{ Form::open() }}
		{{ Form::hidden('x', '', array('id' => 'x')) }}
		{{ Form::hidden('y', '', array('id' => 'y')) }}
		{{ Form::hidden('w', '', array('id' => 'w')) }}
		{{ Form::hidden('h', '', array('id' => 'h')) }}
		{{ Form::hidden('filename', Session::get('filename')) }}
		{{ Form::submit('Bijsnijden', array('class' => 'btn')) }}
	{{ Form::close() }}

	<div class="description section-box">
		<h2>Waarom moet ik mijn afbeelding bijsnijden?</h2>
		<p>Om ervoor te zorgen dat alle inzendingen hetzelfde worden weergegeven over de website hebben covers met een vast formaat van 200 bij 150 pixels.
		Je kan zelf je afbeelding bijsnijden om deze aan de juiste formaat te laten voldoen. Wees gerust wanneer er op je afbeelding wordt geklikt zal de gehele afbeelding weergegeven worden. Het gaat hier dus om een simpele representatie van vaste formaat.</p>
	</div>

	<div class="clearfix"></div>

</div>
</div>
</div>
</div>

@endsection