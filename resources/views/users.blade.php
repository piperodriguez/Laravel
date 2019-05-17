<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado de Usuarios - Curso Laraver</title>
	<!-- e se utiliza para que laravel filtre contenido js y html externo -->
</head>
<body>
	<h1>{{ $title }}</h1>

	<ul>
		@forelse ($users as $user)
			<li>{{ $user->first_name }}, {{ $user->email }}</li>
		@empty
			<label>No hay usuarios registrados</label>
		@endforelse
	</ul>




	<!--@if(empty($users))
		<h3>{{ $mensaje }}</h3>
	<ul>
		@foreach ($users as $user)
		<li>{{ $user->first_name }}, {{ $user->email }}</li>
		@endforeach
	</ul>
	@else
		<label>No hay usuarios registrados</label>
	@endif
	-->

</body>
</html>