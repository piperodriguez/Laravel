<!DOCTYPE html>
<html>
<head>
	<title>Listado de Usuarios - Curso Laraver</title>
	<!--
	e
	se utiliza para que laravel filtre contenido js y html externo
	-->
</head>
<body>
	<h1><?= e($title); ?></h1>
	<ul>
		<?php foreach($users as $user):?>
		<li><?= e($user);?></li>
		<?php endforeach; ?>
	</ul>
	<br>
<!--
	a la manera juan felipe
	<?php
		foreach ($users as $name) {
			echo $name."<br>";
		}
	?>

-->
</body>
</html>