@extends('layout')

@section('contenido')
	<h1>{{ $title }}</h1>

	<nav>
		<ul>
			<li>
				<a href="{{ route('users.nuevo') }}">Crear Usuarios</a>
			</li>
		</ul>
	</nav>
	<br>
	<table border="2" class="table">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email Addres</th>
				<th>Detalle</th>
			</tr>
		</thead>
		<tbody>
		@forelse ($users as $user)
			<tr>
				<td>
					{{ $user->first_name }}
				</td>
				<td>
					{{ $user->last_name }}
				</td>
				<td>
					{{ $user->email }}
				</td>
				<td>
					<!--<a href="{{ url('/usuarios/'.$user->id)}}">Ver Detalles</a>-->
					<!--<a href="{{ action('UserController@show', ['id' => $user->id ]) }}">Ver detalle</a>-->
					<a href="{{ route ('users.show', ['id' => $user->id]) }}">Detalle</a>
				</td>
			</tr>
		@empty
			<label>No hay usuarios registrados</label>
		@endforelse
		</tbody>
	</table>
@endsection



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

