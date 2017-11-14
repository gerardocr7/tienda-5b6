<?php

$dsn = 'mysql:dbname=tienda;host=localhost';
$user = 'tienda';
$password = '1q2w3e4r5t6y';

try{

	$pdo = new PDO( $dsn,
					$user,
					$password
					);

}catch( PDOException $e ){
	echo 'Error al conectarnos: ' . $e->getMessage();
}
?>