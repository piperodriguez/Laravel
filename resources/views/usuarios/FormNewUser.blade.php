@extends('layout')

@section('contenido')
<a href="{{ route('usuarios') }}">Listado de Usuarios</a>
<br>
<h1>Creacion de un nuevo usuarios</h1>
<br>
<form method="POST" action="{{ url('usuarios/save') }}">

	{{csrf_field()}}
	<!--Toquen de seguridad-->
	<br>
	<label>nombre</label>
	<input type="text" name="first_name" id="first_name">
	<br>
	<label>APellido</label>
	<input type="text" name="last_name" id="last_name">
	<br>
	<label>email</label>
	<input type="email" name="email" id="email">
	<br>
	<label>Contraseña</label>
	<input type="password" name="password">
	<br>
	<button type="submit">Crear Usuario</button>
</form>
@endsection