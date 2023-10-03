    <title>Venta</title>
<?php include("database.php") ?>
<?php include("includes/header.php") ?>
<?php include 'db.php'; ?>


<?php

  $stock = $conn->prepare("SELECT * FROM stock");
  $stock->execute();

?>

<?php

function agregarProductoAlCarrito($Product_ID){
  $Session_ID = session_id();
  $query = $conn->prepare("INSERT INTO carrito (ID_Sesion, ID_Producto) VALUES ($Session_ID, Product_ID)");
  $query->execute();
}

?>

<div class= "container p-4">

  <div class="row">

    <div class="col-md-4">

      <?php if(isset($_SESSION['message'])) {?>

        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show"
        role="alert">
          <?= $_SESSION['message']?>
          <button type="button" class="btn-close" data-dismiss="alert"
          aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>

      <?php  }?>

      <div class="card card-body">

        <form action="guardarventa.php" method="post">

            Nombre del producto:

            <SELECT name="Product_ID">
              <?php foreach ($stock as $r) {
                echo "<option value=".$r[0].">".$r[1]."</option>";
              } ?>
            </SELECT>

            <input type="text" name="Product_Quantity" class="form-control"
          placeholder="Cantidad de producto" autofocus>

            <br>

          <input type="submit" name="Guardar" value="Agregar">


        </form>
      </div>

    </div>

        <div class="col-md-8">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
              </tr>
            </thead>
              <tbody>
                <?php
                $query = "SELECT venta.ID_Venta, venta.ID_Producto, venta.Cantidad_Venta, stock.Precio_Producto, stock.Nombre_Producto FROM venta INNER JOIN stock ON stock.ID_Producto = venta.ID_Producto;";
                $resultQuery = mysqli_query($conexion, $query);
                $Total = 0;
                while($row = mysqli_fetch_array($resultQuery)){ ?>
                  <tr>
                    <?php $Precio = 0; ?>
                    <td><?php echo $row['Nombre_Producto'] ?></td>
                    <td><?php echo $row['Cantidad_Venta'] ?></td>
                    <?php
                     $Sell = $row['Cantidad_Venta'];
                     $Buy = $row['Precio_Producto'];
                     $row['Precio_Comercial'] = $Precio;

                    ?>

                    <td> $<?php echo $Precio = $Precio + ($Sell * $Buy);?></td>


                        <?php  $row['Precio_Comercial'] = $Precio?>

                    <?php $Total = $Total + $Precio ?>
                    <td>
                      <a href="editarventa.php?id=<?php echo $row['ID_Venta']?>" class="btn btn-secondary">
                        <i class="fas fa-marker"></i>
                      </a>
                      <a href="eliminareleccion.php?id=<?php echo $row['ID_Venta']?>" class="btn btn-secondary">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>

                <?php }?>
              </tbody>
          </table>
          <th>
              Precio TOTAL: $
            <?php
            echo $Total;
           ?>
         </th>

          <br>
          <br>
  <a href="exito.php" class="button">CONFIRMAR COMPRA</a>
        </div>
  </div>
    <a href="logout.php">Logout</a>
</div>
