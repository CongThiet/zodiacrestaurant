@if (count($errors))
	<div class="alert alert-danger">
		<ul style ="padding-left: 0;">
			@foreach ($errors->all() as $errors)
				<li><strong>{{$errors}}</strong></li>
			@endforeach
		</ul>
	</div>
@endif
