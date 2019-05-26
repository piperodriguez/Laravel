<a href="{{ route('usuarios') }}">Listado de Usuarios</a>
<br>
<h1>Creacion de un nuevo usuarios</h1>
<br>
<form method="POST" action="{{ url('usuarios') }}">

	{{csrf_field()}}
	<!--Toquen de seguridad-->
	<input type="text" name="nombre">
	<br>
	<button type="submit">Crear Usuario</button>
</form>