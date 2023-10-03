<?php
session_start();

if (isset($_SESSION['user_id'])){
  header('Location: /wallmart');
}

  require 'database.php';

  $message = '';

  if(!empty($_POST['user']) && !empty($_POST['password'])){
    $sql = "INSERT INTO usuario (Nombre_Usuario, Contra_Usuario) VALUES (:user, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user',$_POST['user']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password',$password);

    if($stmt->execute()){
      $message = 'Se creo exitosamente un usuario';
    } else{
      $message = 'Ha ocurrido un error creado el usuario';
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
      <?php require 'partials/header.php'?>

      <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <h1>Registrarse</h1>
      <span>o <a href="login.php">Login</a></span>

      <form action="signup.php" method="post">
        <input type="text" name="user" placeholder="Ingrese su nombre de usuario">
        <input type="password" name="password" placeholder="Ingrese la contraseña">
        <input type="submit" name="Ingresar">

      </form>
  </body>
</html>
