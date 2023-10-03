<?php include("database.php") ?>
<?php include("includes/header.php") ?>
<?php include 'db.php'; ?>


<?php

  $stock = $conn->prepare("SELECT * FROM stock");
  $stock->execute();

  $encargado = $conn->prepare("SELECT * FROM empleado");
  $encargado->execute();
?>


                <?php
                $query = "SELECT *FROM solicitud";
                $resultQuery = mysqli_query($conexion, $query);
                ?>
                    <a href="venta.php?id=<?php echo $row['ID_Recibido']?>">
                      Crear Venta
                    </a>

<?php include("includes/footer.php") ?>
