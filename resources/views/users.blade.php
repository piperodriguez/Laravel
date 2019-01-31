@extends('layout');
	@section('content');
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
	@endsection;

	@section('barralateral');
		<h2>Barra lateral personalizada</h2>
	@endsection;
