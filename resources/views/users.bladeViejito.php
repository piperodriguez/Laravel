
@include('header');

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $title }}</h1>
			@if(!empty($users))
			<ul>
				@foreach ($users as $user)
				<li>{{ $user }}</li>
				@endforeach
			</ul>
			@else
				<label>No hay usuarios registrados</label>
			@endif			
		</div>
		<div class="col-md-4">
			@include('barralateral');
		</div>	
	</div>

@include('footer');
