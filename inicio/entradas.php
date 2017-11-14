<?php
	$title = 'Articulos Deportivos';
	require_once('../conexion/conexion.php');

	$sql = 'SELECT * from entradas';

	$statement = $pdo->prepare($sql);
	$statement->execute();
	$resultados=$statement->fetchALL();
?>
<?php
	include('../estend/header.php');
	?>
	<?php
  	include('../estend/footer.php');
  	?>
  	<div class="container"></div>
  	<table>
  		<thead>
  			<tr>
  				<td>fecha</td>
  				<td>unidades</td>
  				<td>proveedor_RFC</td>
  				<td>articulo_codigo_art1</td>
  			</tr>
  		</thead>
  		<tbody>
  			<?php
  				foreach ($resultados as $key)
  					{
            ?>  		
  			<tr>
  				<td><?php echo $key['fecha'] ?></td>
  				<td><?php echo $key['unidades']?></td>
  				<td><?php echo $key['proveedor_RFC'] ?></td>
  				<td><?php echo $key['articulo_codigo_art1'] ?></td>
  			</tr>
  				<?php
  					}
  					?>
  		</tbody>
  	</table>