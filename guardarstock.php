<?php

include('database.php');

if(!empty($_POST['Receieved_date']) && !empty($_POST['Product_ID']) && !empty($_POST['Manager_ID']) && !empty($_POST['Distributor_Name']) && !empty($_POST['Distributor_Price']) && !empty($_POST['Received_Amount'])){

  $receieved_date = $_POST['Receieved_date'];
	$product_id = $_POST['Product_ID'];
	$manager_id = $_POST['Manager_ID'];
	$distributor_name = $_POST['Distributor_Name'];
	$distributor_price = $_POST['Distributor_Price'];
	$received_amount = $_POST['Received_Amount'];

  $response = $conn->prepare("INSERT INTO recibido (Fecha_Recibido, ID_Producto, ID_Encargado, Nombre_Distribuidor, Precio_Distribuidor, Cantidad_Recibida) VALUES (:Receieved_date, :Product_ID, :Manager_ID, :Distributor_Name, :Distributor_Price, :Received_Amount)");
  $response->bindParam(':Receieved_date', $_POST['Receieved_date']);
  $response->bindParam(':Product_ID', $_POST['Product_ID']);
  $response->bindParam(':Manager_ID', $_POST['Manager_ID']);
  $response->bindParam(':Distributor_Name', $_POST['Distributor_Name']);
  $response->bindParam(':Distributor_Price', $_POST['Distributor_Price']);
  $response->bindParam(':Received_Amount', $_POST['Received_Amount']);
  $response->execute();

  $_SESSION['message'] = 'Registro guardado existosamente';
  $_SESSION['message_type'] = 'success';

  header('Location: /wallmart/stock.php');

} else{
  $_SESSION['message'] = 'Error al guardar el registro';
  $_SESSION['message_type'] = 'failure';
  header('Location: /wallmart/stock.php');
}
?>
