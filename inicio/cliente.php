<?php
	$title = 'Articulos Deportivos';
	require_once('../conexion/conexion.php');

	$sql = 'SELECT * from cliente';

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
  				<td>codigoCliente</td>
  				<td>nombreliente</td>
  				<td>apellido_P_Cliente</td>
  				<td>apellido_M_cliente</td>
  			</tr>
  		</thead>
  		<tbody>
  			<?php
  				foreach ($resultados as $key)
  					{
            ?>  		
  			<tr>
  				<td><?php echo $key['codigoCliente'] ?></td>
  				<td><?php echo $key['nombreCliente']?></td>
  				<td><?php echo $key['apellido_P_Cliente'] ?></td>
  				<td><?php echo $key['apellido_M_Cliente'] ?></td>
  			</tr>
  				<?php
  					}
  					?>
  		</tbody>
  	</table>