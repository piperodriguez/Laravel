Manejo de errores  404

Muchas veces cuando realizamos una consulta utilizando SQL o una API, es posible que no se obtenga el resultado esperado debido a que el contenido que el usuario intenta ver no existe. Nosotros como desarrolladores debemos tener en cuenta situaciones como esa en nuestra aplicación, es por ello que en esta lección veremos cómo podemos retornar de forma manual errores 404 y también como hacerlo de forma automática cuando un modelo no es encontrado.



bueno como sabemos jejej 

tenemos que adquirir el habito de realizar pruebas unitarias

entonces vamos a crear una que valide que no existan pinches errores 404

en module.user.test


y creamos la prueba que requiera un estado 404 en la ruta que muestra el usuario en detalle

si la ejecutamos en este momento obtenemos un error 500

ahora hagamos que la prueba pase

nos vamos al controlador de usuarios

y decimo que si la consulta es vacia redireccione a una vista que se llame errors404.php




Retornar una vista con status 404
Cuando retornamos el llamado al helper view() desde una acción, Laravel va a retornar el contenido de la vista con el status HTTP 200 (OK). Nosotros podemos retornar una vista con status 404 (no encontrado) utilizando el helper response y luego encadenando el llamado al método view. Al método view pasamos como primer argumento el nombre de la vista, como segundo argumento los datos y como tercer argumento el status HTTP


Uso de findOrFail
El método findOrFail intentará encontrar el registro correspondiente a la llave primaria pasada como argumento, y si este no es encontrado devolverá una excepción de tipo ModelNotFoundException:

$user = User::findOrFail($id);
1
$user = User::findOrFail($id);
También podemos utilizar el método firstOrFail, que devuelve el primer resultado de la consulta y si ningún registro es encontrado retorna una excepción ModelNotFoundException:

$user = User::where('posts', '>', 100)->firstOrFail();
1
$user = User::where('posts', '>', 100)->firstOrFail();
