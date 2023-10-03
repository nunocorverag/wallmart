<?php

include('database.php');

if(!empty($_POST['Product_ID']) && !empty($_POST['Product_Quantity'])){

	$product_id = $_POST['Product_ID'];
	$product_quantity = $_POST['Product_Quantity'];

  $response = $conn->prepare("INSERT INTO venta (ID_Producto, Cantidad_Venta) VALUES (:Product_ID, :Product_Quantity)");
  $response->bindParam(':Product_ID', $_POST['Product_ID']);
  $response->bindParam(':Product_Quantity', $_POST['Product_Quantity']);
  $response->execute();

  $_SESSION['message'] = 'Venta guardada existosamente';
  $_SESSION['message_type'] = 'success';

  header('Location: /wallmart/venta.php');

} else{
  $_SESSION['message'] = 'Error al guardar la venta';
  $_SESSION['message_type'] = 'failure';
  header('Location: /wallmart/venta.php');
}
?>
