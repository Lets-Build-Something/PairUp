@if ( isset($errors) && $errors->any())

	<div class="alert {{ $errors_class }} fade in">
		@foreach ($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach
	</div>

@endif
