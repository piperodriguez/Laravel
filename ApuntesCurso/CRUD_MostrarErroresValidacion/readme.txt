En esta lección veremos cómo podemos mostrar mensajes de validación en nuestras vistas, utilizando la variable $errors y los diferentes métodos que Laravel nos proporciona. También veremos cómo podemos conservar el valor de un campo en caso de que ocurran errores de validación.


https://laravel.com/docs/5.1/testing#disabling-middleware


bueno en esa dcumentacion buscar valdiations errors

en la vista donde tenemos el formulario vamos a agregar cod

abajo del titulo del formulario


@if($errors->any())
	@foreach($errors->all() as $error)
		<li>{{$error}}</li>
	@endforeach
@endif

https://styde.net/mostrar-mensajes-de-errores-de-validacion-con-laravel/