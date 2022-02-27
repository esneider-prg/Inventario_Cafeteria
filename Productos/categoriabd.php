<?php

//print_r($_POST)






$txtNombreCategoria = (isset($_POST['txtNombreCategoria'])) ? $_POST['txtNombreCategoria'] : "";
$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
$txtAgregado = (isset($_POST['txtAgregado'])) ? $_POST['txtAgregado'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


include("../Conexion/conexion.php");





          $sentencia = $pdo->prepare("SELECT * FROM `categoria` ");
          $sentencia->execute();
          $listaCategoria = $sentencia->fetchALL(PDO::FETCH_ASSOC);

?>