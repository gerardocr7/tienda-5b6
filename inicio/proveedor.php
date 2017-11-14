<?php
	$title = 'Articulos Deportivos';
	require_once('../conexion/conexion.php');

	$sql = 'SELECT * from proveedor';

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
  				<td>RFC</td>
  				<td>razonSocial</td>
  				<td>dominiofiscall</td>
  				
  			</tr>
  		</thead>
  		<tbody>
  			<?php
  				foreach ($resultados as $key)
  					{
            ?>  		
  			<tr>
  				<td><?php echo $key['RFC'] ?></td>
  				<td><?php echo $key['razonSocial']?></td>
  				<td><?php echo $key['dominiofiscall'] ?></td>
  				
  			</tr>
  				<?php
  					}
  					?>
  		</tbody>
  	</table>