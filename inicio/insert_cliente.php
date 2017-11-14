<?php
	$title = 'Articulos Deportivos';
	require_once('../conexion/conexion.php');
  if($_GET){

      $insert_cliente='INSERT INTO cliente(codigoCliente,nombreCliente,apellido_P_Cliente,apellido_M_Cliente) values (?,?,?,?,)';
     $codigoCliente=isset($_GET['codigoCliente'])? $_GET['codigoCliente']:"";
     $nombreCliente=isset($_GET['nombreCliente'])? $_GET['nombreCliente']:"";
     $apellido_P_Cliente=isset($_GET['apellido_P_Cliente'])? $_GET['apellido_P_Cliente']:"";
     $apellido_M_Cliente=isset($_GET['apellido_M_Cliente'])? $_GET['apellido_M_Cliente']:"";

     $statement_insert=$pdo->prepare($insert_cliente);
     $statement_insert->execute(array($codigoCliente,$nombreCliente,$apellido_P_Cliente,$apellido_M_Cliente,));
     
  }


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
  	<div class="container">
        <h3>Insertar clientes</h3>
        <form method="get">
          <input placeholder="codigoCliente" name="codigoCliente" type="text">
          <input placeholder="nombre" name="nombre " type="text">
          <input placeholder="apellido paterno" name="apellido_P_Cliente" type="text">
          <input placeholder="apellido materno" name="apellido_M_Cliente" type="text">

          <input type="submit" value="Agregar" class="btn">
        </form>
  	<table>
  		<thead>
  			<tr>
  				<td>codigoCliente</td>
  				<td>nombreCliente</td>
  				<td>apellido_P_Cliente</td>
  				<td>apellido_M_Cliente</td>
  	
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
    </div>