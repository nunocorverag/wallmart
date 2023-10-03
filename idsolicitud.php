<?php include("database.php") ?>
<?php include("includes/header.php") ?>
<?php include 'db.php'; ?>


<?php
$response = $conn->prepare("INSERT INTO solicitud (ID_Solicitud) VALUES (:Request_ID)");
$response->bindParam(':Request_ID', $_POST['Request_ID']);
$response->execute();
  header('Location: /wallmart/venta.php');
?>
