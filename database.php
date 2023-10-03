<?php

  $server = 'localhost:3307';
  $username = 'root';
  $password = '';
  $database = 'wallmart';

  try{
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
  } catch (PDOException $e){
    die('Conexion fallida: '.$e->getMessage());
  }

?>
