@if (count($errors))
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $errors)
				<li><strong>{{$errors}}</strong></li>
			@endforeach
		</ul>
	</div>
@endif
