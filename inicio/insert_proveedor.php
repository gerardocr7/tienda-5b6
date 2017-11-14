<?php
	$title = 'Articulos Deportivos';
	require_once('../conexion/conexion.php');
  if($_GET){

      $insert_proveedor='INSERT INTO proveedor(RFC,razonSocial,dominiofiscall) values (?,?,?,)';
     $RFC=isset($_GET['RFC'])? $_GET['RFC']:"";
     $razonSocial=isset($_GET['razonSocial'])? $_GET['razonSocial']:"";
     $dominiofiscall=isset($_GET['dominiofiscall'])? $_GET['dominiofiscall']:"";

     $statement_insert=$pdo->prepare($insert_proveedor);
     $statement_insert->execute(array($RFC,$razonSocial,$dominiofiscall,));
     
  }


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
  	<div class="container">
        <h3>Insertar proveedores</h3>
        <form method="get">
          <input placeholder="RFC" name="RFC" type="text">
          <input placeholder="razonSocial" name="razonSocial" type="text">
          <input placeholder="dominiofiscall" name="dominiofiscall" type="text">

          <input type="submit" value="Agregar" class="btn">
        </form>
  	<table>
  		<thead>
  			<tr>
  				<td>RFC</td>
  				<td>razonSocial</td>
  				<td>dominiofiscal</td>
  	
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
    </div>