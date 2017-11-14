<?php
	$title = 'Articulos Deportivos';
	require_once('../conexion/conexion.php');
  if($_GET){

      $insert_articulo='INSERT INTO articulo(codigo_art,nombreArticulo,medida,precio,descripcion) values (?,?,?,?,?)';
     $codigo=isset($_GET['codigo'])? $_GET['codigo']:"";
     $nombre=isset($_GET['nombre'])? $_GET['nombre']:"";
     $medida=isset($_GET['medida'])? $_GET['medida']:"";
     $precio=isset($_GET['precio'])? $_GET['precio']:"";
     $descripcion=isset($_GET['descripcion'])? $_GET['descripcion']:"";

     $statement_insert=$pdo->prepare($insert_articulo);
     $statement_insert->execute(array($codigo,$nombre,$medida,$precio,$descripcion));
     
  }


	$sql = 'SELECT * from articulo';

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
        <h3>Insertar art&iacute;culos</h3>
        <form method="get">
          <input placeholder="codigo del articulo" name="codigo" type="text">
          <input placeholder="nombre  del articulo" name="nombre" type="text">
          <input placeholder="medida del articulo" name="medida" type="text">
          <input placeholder="precio del articulo" name="precio" type="text">
          <input placeholder="descripcion del articulo" name="descripcion" type="text">

          <input type="submit" value="Agregar" class="btn">
        </form>
  	<table>
  		<thead>
  			<tr>
  				<td>c&oacute;digo art&iacute;culo</td>
  				<td>nombre</td>
  				<td>medida</td>
  				<td>precio</td>
  				<td>descripci&oacute;n</td>
  			</tr>
  		</thead>
  		<tbody>
  			<?php
  				foreach ($resultados as $key)
  					{
            ?>  		
  			<tr>
  				<td><?php echo $key['codigo_art'] ?></td>
  				<td><?php echo $key['nombreArticulo']?></td>
  				<td><?php echo $key['medida'] ?></td>
  				<td><?php echo $key['precio'] ?></td>
  				<td><?php echo $key['descripcion'] ?></td>
  			</tr>
  				<?php
  					}
  					?>
  		</tbody>
  	</table>
    </div>