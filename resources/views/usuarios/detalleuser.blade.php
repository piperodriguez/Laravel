<h1>bienvenido {{$user->first_name}} {{$user->last_name}}</h1>
<label>este es tu correo {{$user->email}}</label>
<!--url()->previous este metodo devuelve la url anterior-->
<p>
	<!--<a href="{{ url()->previous() }}">Regresar</a>-->
	<!--<a href="{{ url('/usuarios') }}">Regresar</a>-->
	<a href="{{ route('usuarios') }}">Regresar</a>
</p>