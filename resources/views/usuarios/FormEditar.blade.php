@extends('layout')

@section('contenido')
<a href="{{ route('usuarios') }}">Listado de Usuarios</a>
<br>
<h1>Editar Usuario</h1>
@if($errors->any())
	<div class="alert alert-danger">
		<p>Por favor corrige los siguientes errores:</p>
		<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
@endif
<form method="POST" action="{{ url("usuarios/{$user->id}") }}">
	{{ method_field('PUT') }}
	<!--para enviar el formulario con el metodo put-->
	{{csrf_field()}}
	<!--Toquen de seguridad-->
	<div class="form-group">
		<label>(*) Nombre</label>
		<input type="text" name="first_name" class="form-control" placeholder="first_name" value="{{ old('first_name', $user->first_name) }}">
	</div>
	<div class="form-group">
		<label>APellido</label>
		<input type="text" name="last_name" class="form-control" placeholder="last_name" value="{{ old('last_name', $user->last_name) }}">

	</div>
	<div class="form-group">
		<label>email</label>
		<input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">

	</div>
	<div class="form-group">
		<label>Contraseña</label>
		<input type="password" name="password" class="form-control" placeholder="Mayor a 6 caracteres">

	</div>
	<button type="submit">Actualizar Usuario</button>
</form>
@endsection