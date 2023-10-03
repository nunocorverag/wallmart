    <title>Inicio</title>
<?php
  session_start();

  require 'database.php';

  if(isset($_SESSION['user_id'])){
    $records = $conn->prepare('SELECT ID_Usuario, Nombre_Usuario, Contra_Usuario FROM usuario WHERE ID_Usuario = :ID');
    $records->bindParam(':ID', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(count($results) > 0){
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php'?>

    <?php  if(!empty($user)): ?>

    <?php  if($user['ID_Usuario'] == 1):?>

    <br>Bienvenido. <?= $user['Nombre_Usuario']?>
    <br>Es el admin
    <a href="logout.php">Logout</a>
    <?php   header('Location: /wallmart/stock.php'); ?>


    <?php  else: ?>

    <br>Bienvenido. <?= $user['Nombre_Usuario']?>
    <br>Bienvenido usuario de ventas
    <a href="logout.php">Logout</a>
    <?php   header('Location: /wallmart/solicitud.php'); ?>
    <<?php endif; ?>


  <?php else: ?>
    <h1>Porfavor ingrese o registrese</h1>
    <a href="login.php">Login</a> o
    <a href="signup.php">Registrarse</a>
  <?php endif; ?>
  </body>
</html>
