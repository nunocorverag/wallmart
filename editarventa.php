<?php include ('database.php') ?>
<?php include('db.php'); ?>

<?php

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM venta WHERE ID_Venta = $id";
    $resultQuery = mysqli_query($conexion, $query);
    if(mysqli_num_rows($resultQuery) == 1){
      $row = mysqli_fetch_array($resultQuery);
      $product_id = $row['ID_Producto'];
      $product_quantity = $row['Cantidad_Venta'];
    }
  }

  if (isset($_POST['update'])){
    $id = $_GET['id'];
  	$product_id = $_POST['Product_ID'];
  	$product_quantity = $_POST['Selled_Quantity'];

    $query = "UPDATE venta SET ID_Producto = '$product_id', Cantidad_Venta = '$product_quantity' WHERE ID_Venta = $id";
    mysqli_query($conexion, $query);

    $_SESSION['message'] = 'Registros actualizados';
    $_SESSION['message_type'] = 'warning';
    header("Location: venta.php");
  }

 ?>

<?php

$stock = $conn->prepare("SELECT * FROM stock");
$stock->execute();


?>


<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="row">
    <div class="col-,d-4 mx-auto">
      <div class="card card-body">
        <form action="editarventa.php?id=<?php echo $_GET['id']; ?>" method="post">
          <div class="form-group">

            Actualizar Nombre del producto:

            <SELECT name="Product_ID">
              value="<?php foreach ($stock as $r) {
                echo "<option value=".$r[0].">".$r[1]."</option>";
              } ?>"
            </SELECT>

            <br>

            <input type="text" name="Selled_Quantity" value="<?php echo $product_quantity ?>"
            class="form-control" placeholder="Cantidad" autofocus>

          </div>
          </div>
          <button type="submit" class="btn-success" name="update">
            Actualizar
          </button>
        </form>

      </div>

    </div>

  </div>

</div>

<?php include("includes/footer.php") ?>
