<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<title>Listado de Usuarios - Curso Laraver</title>
	<!-- e se utiliza para que laravel filtre contenido js y html externo -->
</head>
<body>
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
</body>
</html>