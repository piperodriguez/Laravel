


En esta lección 35 del Curso de Laravel 5.5 desde cero seguiremos con la construcción de la acción para editar usuarios y aprenderemos cómo podemos hacer que el campo para la contraseña sea opcional.




Recuerda que puedes traducir los mensajes de error pasando un array asociativo como segundo argumento al método validate():

$data = request()->validate([
    'name' => 'required'
], [
    'name.required' => 'El campo nombre es obligatorio'
]);

Con assertCredentials podemos verificar las credenciales del usuario en la base de datos. Este método acepta un arreglo con las credenciales como primer argumento:

$this->assertCredentials([
    'name' => 'Duilio',
    'email' => 'duilio@styde.net',
    'password' => $oldPassword
]);

Dentro del controlador, verificamos si la contraseña no es null y si no lo es la encriptamos, en caso contrario utilizamos unset() para eliminar el índice password de $data. (Laravel automáticamente convierte los campos de formularios vacíos en null)

PHP
if ($data['password'] != null) {
    $data['password'] = bcrypt($data['password']);
} else {
    unset($data['password']);
}


