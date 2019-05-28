crearemos el formulario para el registro de nuevos usuarios en la aplicación, utilizando como base la prueba y el código que escribimos en la lección anterior.

Para generar el token debes llamar al helper dentro del formulario:

<form action="" method="POST">
    {{ csrf_field() }}
    ...
</form>

