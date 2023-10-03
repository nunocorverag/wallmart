<?php

include('database.php');

if(!empty($_POST['ID']) && !empty($_POST['Quantity'])){
  $ID = $_POST['ID'];
	$Quantity = $_POST['Quantity'];


  $response = $conn->prepare("call mod_cantidad($ID, $Quantity)");
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
