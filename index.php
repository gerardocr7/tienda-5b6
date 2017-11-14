<?php
	$Title = "MI primera pagina web en php";
	$mensaje = "Hola Mundo!!!";
	$suma = 4 + 3;
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Title; ?>
    </title>
</head>
</body>
<h1>
<?php
	echo $mensaje;
	echo $suma;
	?>
</h1>
</body>
</html>