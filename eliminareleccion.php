<?php include ('db.php'); ?>>
<?php

    $id=$_GET['id'];
    $query = "DELETE FROM venta WHERE ID_Venta = $id";
    $resultQuery = mysqli_query($conexion, $query);

    if (!$resultQuery){
      die("Consulta fallida!");
    }
    $_SESSION['message'] = 'Registro removido con exito!';
    $_SESSION['message_type'] = 'danger';
    header('Location: /wallmart/venta.php');
?>
