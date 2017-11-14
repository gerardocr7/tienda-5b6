<?php
  $title = 'Articulos Deportivos';
  require_once('../conexion/conexion.php');
  if($_GET){

      $insert_salidas='INSERT INTO salidas(articulo_codigo_art,fecha,unidades,clientes_codigoCliente,articulo_codigo_art1,cliente_codigoCliente) values (?,?,?,?,?,?)';
     $articulo_codigo_art=isset($_GET['articulo_codigo_art'])? $_GET['articulo_codigo_art']:"";
     $fecha=isset($_GET['fecha'])? $_GET['fecha']:"";
     $unidades=isset($_GET['unidades'])? $_GET['unidades']:"";
     $clientes_codigoCliente=isset($_GET['clientes_codigoCliente'])? $_GET['clientes_codigoCliente']:"";
     $articulo_codigo_art1=isset($_GET['articulo_codigo_art1'])? $_GET['articulo_codigo_art1']:"";
     $clientes_codigoCliente=isset($_GET['clientes_codigoCliente'])? $_GET['clientes_codigoCliente']:"";

     $statement_insert=$pdo->prepare($insert_salidas);
     $statement_insert->execute(array($articulo_codigo_art,$fecha,$unidades,$clientes_codigoCliente,$articulo_codigo_art1,$clientes_codigoCliente));
     
  }


  $sql = 'SELECT * from salidas';

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
        <h3>Insertar salidas</h3>
        <form method="get">
          <input placeholder="articulo_codigo_art" name="articulo_codigo_art" type="text">
          <input placeholder="fecha" name="fecha" type="text">
          <input placeholder="unidades" name="unidades" type="text">
          <input placeholder="clientes_codigoCliente" name="clientes_codigoCliente" type="text">
          <input placeholder="articulo_codigo_art1" name="articulo_codigo_art1" type="text">
          <input placeholder="clientes_codigoCliente" name="clientes_codigoCliente" type="text">

          <input type="submit" value="Agregar" class="btn">
        </form>
    <table>
      <thead>
        <tr>
          <td>codigo del cliente</td>
          <td>fecha</td>
          <td>unidades</td>
          <td>clientes_codigoCliente</td>
          <td>articulo_codigo_art1</td>
          <td>clientes_codigoCliente</td>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($resultados as $key)
            {
            ?>      
        <tr>
          <td><?php echo $key['articulo_codigo_art'] ?></td>
          <td><?php echo $key['fecha']?></td>
          <td><?php echo $key['unidades'] ?></td>
          <td><?php echo $key['clientes_codigoCliente'] ?></td>
          <td><?php echo $key['articulo_codigo_art1'] ?></td>
          <td><?php echo $key['clientes_codigoCliente'] ?></td>s
        </tr>
          <?php
            }
            ?>
      </tbody>
    </table>
    </div>