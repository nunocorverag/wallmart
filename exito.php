    <title>Compra exitosa</title>
<?php include("database.php") ?>
<?php include("includes/header.php") ?>
<?php include 'db.php'; ?>

<?php
$response = $conn->prepare("TRUNCATE TABLE venta");
$response->execute();
?>
COMPRA REALIZADA CON EXITO
<br>
Si requiere hacer otra compra, puede hacer otra Solicitud
<br>
  <a href="solicitud.php" class="button">Nueva solicitud</a>
  <br>
Si quiere salir de su cuenta puede salir
<br>
  <a href="logout.php" class="button">LOGOUT</a>
