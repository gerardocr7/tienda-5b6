<?php
	$title = 'entradas';
	$title_menu = 'entradas';
	require_once('../conexion/conexion.php');

	$sql_articulo = 'SELECT * from articulo';
	$statement_articulo = $pdo->prepare($sql_articulo);
	$statement_articulo->execute();
	$resultados_articulo = $statement_articulo->fetchAll();

	$sql_proveedor = 'SELECT * from proveedor';
	$statement_proveedor = $pdo->prepare($sql_proveedor);
	$statement_proveedor->execute();
	$resultados_proveedor = $statement_proveedor->fetchAll();


	if ($_GET) {
		$codigo_articulo = isset($_GET['txtCodigoArticulo']) ? $_GET['txtCodigoArticulo'] : '';
		
		$fecha = isset($_GET['txtFecha']) ? $_GET['txtFecha'] : '';

		$unidades = isset($_GET['txtUnidades']) ? $_GET['txtUnidades'] : '';
		$proveedores = isset($_GET['txtProveedorRFC']) ? $_GET['txtProveedorRFC'] : '';

		//echo $codigo_articulo.' - 	'.$fecha.' - 	'.$unidades.' - 	'.$proveedores;

		$insert_entradas = 'INSERT INTO entradas (articulo_codigo_art, fecha, unidades, proveedores_rfc) VALUES (?, ?, ?, ?)';
		$statement_insert = $pdo->prepare($insert_entradas);
		$statement_insert->execute(array($codigo_articulo, $fecha, $unidades, $proveedor));
	}
?>

<?php
	include('../estend/header.php');
?>

<div class="container">
<h3>Insertar <?php echo $title?></h3>
<form method="get">
<select name="txtCodigoArticulo">
	<?php 
		foreach($resultados_articulo as $rs) {
	?>
	<option value="<?php echo $rs['codigo_art']?>;"><?php echo $rs['nombreArticulo']?></option>
	<?php 
		}
	?>
</select>

<input placeholder="" name="txtFecha" type="text">
<input placeholder="" name="txtUnidades" type="text">
<select name="txtProveedoresRFC">
	<?php 
		foreach($resultados_proveedores as $rs) {
	?>
	<option value="<?php echo $rs['rfc']?>"><?php echo $rs['razonSocial']?></option>
	<?php 
		}
	?>
</select>

<input type="submit" value="Agregar" class="btn">
</form>


</div>

<?php 
	include('../estend/footer.php');
?>