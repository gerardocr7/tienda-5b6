<?php
  $title = 'Articulos Deportivos';
  require_once('../conexion/conexion.php');

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
    <div class="container"></div>
    <table>
      <thead>
        <tr>
          <td>articulo_codigo_art</td>
          <td>fecha</td>
          <td>unidades</td>
          <td>clientes_codigoCliente</td>
          <td>articulo_codigo_art1</td>
          <td>cliente_codigoCliente</td>
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
          <td><?php echo $key['cliente_codigoCliente'] ?></td>
        </tr>
          <?php
            }
            ?>
      </tbody>
    </table>