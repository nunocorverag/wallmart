<?php

  session_start();

  if (isset($_SESSION['user_id'])){
    header('Location: /wallmart');
  }

require 'database.php';

  if(!empty($_POST['user']) && !empty($_POST['password'])){
  $records = $conn->prepare('SELECT ID_Usuario, Nombre_Usuario, Contra_Usuario FROM usuario WHERE Nombre_Usuario = :user');
  $records->bindParam(':user', $_POST['user']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['Contra_Usuario'])){
    $_SESSION['user_id'] = $results['ID_Usuario'];
    header('Location: /wallmart');
  } else {
    $message = 'El usuario o la contraseña no coinciden!';
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

    <h1>Login</h1>
          <span>o <a href="signup.php">Registrarse</a></span>

    <?php if(!empty($message)) :?>
      <p><?= $message ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
      <input type="text" name="user" placeholder="Ingrese su nombre de usuario">
      <input type="password" name="password" placeholder="Ingrese la contraseña">
      <input type="submit" name="Ingresar">

    </form>

  </body>
</html>
