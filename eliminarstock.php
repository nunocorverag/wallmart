<?php include ('db.php'); ?>>
<?php

    $id=$_GET['id'];
    $query = "DELETE FROM recibido WHERE ID_Recibido = $id";
    $resultQuery = mysqli_query($conexion, $query);

    if (!$resultQuery){
      die("Consulta fallida!");
    }
    $_SESSION['message'] = 'Registro removido con exito!';
    $_SESSION['message_type'] = 'danger';
    header('Location: /wallmart/stock.php');
?>
