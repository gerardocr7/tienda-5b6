<?php
	$title = 'Articulos Deportivos';
	require_once('../conexion/conexion.php');

	$mostrar_formulario_edicion= FALSE;
  if($_POST){
      $sql_update='UPDATE articulo SET codigo_art=?, nombreArticulo=?, medida=?, precio=? ,descripcion= WHERE codigo_art?,';

      $codigo=isset($_GET['codigo'])? $_GET['codigo']:"";  
      $codigo2=isset($_POST['codigo2'])? $POST['codigo2']:"";
      $nombre=isset($_POST['nombre'])? $_POST['nombre']:"";
      $medida=isset($_POST['medida'])? $_POST['medida']:"";
      $precio=isset($_POST['precio'])? $_POST['precio']:"";
      $descripcion=isset($_POST['descripcion'])? $_POST['descripcion']:"";

      $statement_update = $pdo->prepare($sql_update);
      $statement_update->execute(array($codigo2, $nombre, $medida, $precio, $descripcion, $codigo));

      header('location:articulo.php');
  }
    if(isset($_GET['codigo'])){
      $mostrar_formulario_edicion= TRUE;
      $sql_seleccionar_codigo='SELECT * from articulo WHERE codigo_art=?';
      $codigo= isset($_GET['codigo'])? $_GET['codigo']: 0;

      $statement_consultar=$pdo->prepare($sql_seleccionar_codigo);
      $statement_consultar->execute(array($codigo));
      $rs_consulta = $statement_consultar->fetch();
    }

    $sql = 'SELECT * from articulo';

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $resultados=$statement->fetchALL();

?>
   <?php
  include('../estend/header.php');
  ?>
    
	
  	<div class="container">
        <?php
          if($mostrar_formulario_edicion) {
        ?>
        <form method="post">
          <input placeholder="codigo del articulo" name="codigo" type="text" value="<?php echo $rs_consulta['codigo_art']?>">
          <input placeholder="nombre  del articulo" name="nombre" type="text" value="<?php echo $rs_consulta['nombreArticulo']?>">
          <input placeholder="medida del articulo" name="medida" type="text" value="<?php echo $rs_consulta['medida']?>">
          <input placeholder="precio del articulo" name="precio" type="text" value="<?php echo $rs_consulta['precio']?>">
          <input placeholder="descripcion del articulo" name="descripcion" type="text" value="<?php echo $rs_consulta['descripcion']?>">

          <input type="submit" value="Agregar" class="btn">
        </form>

          

        <?php
            }
            ?>
    <div class="row">
    <?php

          foreach ($resultados as $key)
            {
      ?>
      <div class="col s4 m4">
        <div class="card light-blue">
          <div class="card-content white-text">
            <span class="card-title">
              codigo articulo: <?php echo $key['codigo_art'] ?>
            </span>
            <p>
              nombre:  <?php echo $key['nombreArticulo']?><br>
              medida: <?php echo $key['medida'] ?><br>
              precio: <?php echo $key['precio'] ?><br>
              descripcion: <?php echo $key['descripcion'] ?><br>

            </p>
            
          </div>
          <div class="card-action">
            <a href="articulo.php?codigo=<?php echo $key['codigo_art'] ?>"=>Editar</a>
            <a href=·=>Borrar</a>
          </div>
        </div>
      </div>
          
              <?php
               }
            ?>

            </div>
            </div>
            <?php
    include('../estend/footer.php');
    ?>