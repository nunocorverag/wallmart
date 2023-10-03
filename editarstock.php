<?php include ('database.php') ?>
<?php include('db.php'); ?>

<?php

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM recibido WHERE ID_Recibido = $id";
    $resultQuery = mysqli_query($conexion, $query);
    if(mysqli_num_rows($resultQuery) == 1){
      $row = mysqli_fetch_array($resultQuery);
      $product_id = $row['ID_Producto'];
      $manager_id = $row['ID_Encargado'];
      $distributor_name = $row['Nombre_Distribuidor'];
      $distributor_price = $row['Precio_Distribuidor'];
      $receieved_date = $row['Cantidad_Recibida'];
    }
  }

  if (isset($_POST['update'])){
    $id = $_GET['id'];
  	$product_id = $_POST['Product_ID'];
  	$manager_id = $_POST['Manager_ID'];
  	$distributor_name = $_POST['Distributor_Name'];
  	$distributor_price = $_POST['Distributor_Price'];
  	$received_amount = $_POST['Received_Amount'];

    $query = "UPDATE recibido SET Fecha_Recibido = '$Receieved_date', ID_Producto = '$product_id', ID_Encargado = '$manager_id', Nombre_Distribuidor = '$distributor_name', Precio_Distribuidor = '$distributor_price', Cantidad_Recibida = '$received_amount' WHERE ID_Recibido = $id";
    mysqli_query($conexion, $query);

    $_SESSION['message'] = 'Registros actualizados';
    $_SESSION['message_type'] = 'warning';
    header("Location: stock.php");
  }

 ?>

<?php

$stock = $conn->prepare("SELECT * FROM stock");
$stock->execute();

$encargado = $conn->prepare("SELECT * FROM empleado");
$encargado->execute();

?>


<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="row">
    <div class="col-,d-4 mx-auto">
      <div class="card card-body">
        <form action="editarstock.php?id=<?php echo $_GET['id']; ?>" method="post">
          <div class="form-group">

            Actualizar Nombre del producto:

            <SELECT name="Product_ID">
              value="<?php foreach ($stock as $r) {
                echo "<option value=".$r[0].">".$r[1]."</option>";
              } ?>"
            </SELECT>

            <br>
            <br>Actualizar ID del empleado:

            <SELECT name="Manager_ID">
              value="<?php foreach ($encargado as $r) {
               echo "<option value=".$r[0].">".$r[0]."</option>";
             } ?>"
            </SELECT>

            <br>
            <br>


            <input type="text" name="Distributor_Name" value="<?php echo $distributor_name ?>"
            class="form-control"
            placeholder="Actualizar nombre del distribuidor" autofocus>

            <br>

            <input type="text" name="Distributor_Price" value="<?php echo $distributor_price ?>"
            class="form-control" placeholder="Precio del distribuidor" autofocus>

            <br>

            <input type="text" name="Received_Amount" value="<?php echo $receieved_date ?>"
            class="form-control" placeholder="Cantidad recibida" autofocus>

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
