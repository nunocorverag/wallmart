    <title>Stock</title>
<?php include("database.php") ?>
<?php include("includes/header.php") ?>
<?php include 'db.php'; ?>


<?php

  $stock = $conn->prepare("SELECT * FROM stock");
  $stock->execute();

  $encargado = $conn->prepare("SELECT * FROM empleado");
  $encargado->execute();
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

        <form action="guardarstock.php" method="post">

            Fecha de Recibido
            <input type="date" name="Receieved_date" class="form-control"
             autofocus>

            Nombre del producto:

            <SELECT name="Product_ID">
              <?php foreach ($stock as $r) {
                echo "<option value=".$r[0].">".$r[1]."</option>";
              } ?>
            </SELECT>

            <br>

            <br>ID del empleado:

            <SELECT name="Manager_ID">
              <?php foreach ($encargado as $r) {
               echo "<option value=".$r[0].">".$r[0]."</option>";
              } ?>
            </SELECT>

            <input type="text" name="Distributor_Name" class="form-control"
          placeholder="Nombre del distribuidor" autofocus>

            <input type="text" name="Distributor_Price" class="form-control"
          placeholder="Precio del distribuidor" autofocus>

            <input type="text" name="Received_Amount" class="form-control"
          placeholder="Cantidad recibida" autofocus>

          <input type="submit" name="Guardar" value="save">

        </form>
      </div>

    </div>

        <div class="col-md-8">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Fecha de recibido</th>
                <th>Producto</th>
                <th>ID del Encargado</th>
                <th>Nombre del distribuidor</th>
                <th>Precio del distribuidor</th>
                <th>Cantidad recibida del producto</th>
                <th>Acciones</th>
              </tr>
            </thead>
              <tbody>
                <?php
                $query = "SELECT *FROM recibido INNER JOIN stock ON stock.ID_Producto = recibido.ID_Producto";
                $resultQuery = mysqli_query($conexion, $query);

                while($row = mysqli_fetch_array($resultQuery)){ ?>
                  <tr>
                    <td><?php echo $row['Fecha_Recibido'] ?></td>
                    <td><?php echo $row['Nombre_Producto'] ?></td>
                    <td><?php echo $row['ID_Encargado'] ?></td>
                    <td><?php echo $row['Nombre_Distribuidor'] ?></td>
                    <td><?php echo $row['Precio_Distribuidor'] ?></td>
                    <td><?php echo $row['Cantidad_Recibida'] ?></td>
                    <td>
                      <a href="editarstock.php?id=<?php echo $row['ID_Recibido']?>" class="btn btn-secondary">
                        <i class="fas fa-marker"></i>
                      </a>
                      <a href="eliminarstock.php?id=<?php echo $row['ID_Recibido']?>" class="btn btn-secondary">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                  <?php

                  ?>


                <?php }?>
              </tbody>
          </table>

        </div>

        <div class="card card-body">
          Cambiar cantidad de producto
          <form action="guardar.php" method="post">

              <input type="text" name="ID" class="form-control"
            placeholder="ID Producto" autofocus>

              <input type="text" name="Quantity" class="form-control"
            placeholder="Cantidad Producto" autofocus>

            <input type="submit" name="Guardar" value="save">

          </form>
        </div>

        <div class="col-md-8">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID del Producto</th>
                <th>Nombre del Producto</th>
                <th>Precio del Producto</th>
                <th>Cantidad del Procuto</th>
              </tr>
            </thead>
              <tbody>
                <?php
                $stock = "SELECT *FROM stock";
                $resultStock = mysqli_query($conexion, $stock);

                while($row = mysqli_fetch_array($resultStock)){ ?>
                  <tr>
                    <td><?php echo $row['ID_Producto'] ?></td>
                    <td><?php echo $row['Nombre_Producto'] ?></td>
                    <td><?php echo $row['Precio_Producto'] ?></td>
                    <td><?php echo $row['Cantidad_Producto'] ?></td>
                  </tr>


                <?php }?>
              </tbody>
          </table>

        </div>

        <div class="col-md-8">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Cantidad de venta</th>
                <th>Nombre del producto</th>
              </tr>
            </thead>
              <tbody>
                TABLA TOP VAYOR CANTIDAD DE VENTA DE ARTICULO
                <?php
                $stock = "SELECT *FROM top_articulos_cantidad";
                $resultStock = mysqli_query($conexion, $stock);

                while($row = mysqli_fetch_array($resultStock)){ ?>
                  <tr>
                    <td><?php echo $row['Cantidad_Venta'] ?></td>
                    <td><?php echo $row['Nombre_Producto'] ?></td>
                  </tr>


                <?php }?>
              </tbody>
          </table>

        </div>


        <div class="col-md-8">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Precio de venta</th>
                <th>Nombre del producto</th>
              </tr>
            </thead>
              <tbody>
                TABLA TOP ARTICULOS EN STOCK
                <?php
                $stock = "SELECT *FROM top_articulos_stock";
                $resultStock = mysqli_query($conexion, $stock);

                while($row = mysqli_fetch_array($resultStock)){ ?>
                  <tr>
                    <td><?php echo $row['Cantidad_Producto'] ?></td>
                    <td><?php echo $row['Nombre_Producto'] ?></td>
                  </tr>


                <?php }?>
              </tbody>
          </table>

        </div>

  </div>
    <br>
    <br>
    <a href="logout.php">Logout</a>
</div>


<?php include("includes/footer.php") ?>
