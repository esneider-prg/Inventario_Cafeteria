<?php

//print_r($_POST)






$txtNombreCategoria = (isset($_POST['txtNombreCategoria'])) ? $_POST['txtNombreCategoria'] : "";
$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
$txtAgregado = (isset($_POST['txtAgregado'])) ? $_POST['txtAgregado'] : "";
$txtidCategoria = (isset($_POST['txtidCategoria'])) ? $_POST['txtidCategoria'] : "";

$accionC = (isset($_POST['accionC'])) ? $_POST['accionC'] : "";








date_default_timezone_set('America/Mexico_city');
$txtFecha=date("Y-m-d H:i:s");
$txtHora=date("H:i:s");
$mostrarModalCate = false;
include("../Conexion/conexion.php");









switch ($accionC) {

    case "btnAgregarCategoria":
       


        $sentencia = $pdo->prepare("INSERT INTO categoria(NombreCategoria,Descripcion,Agregado)
        VALUES (:NombreCategoria,:Descripcion,:Agregado)");


    $sentencia->bindParam(':NombreCategoria', $txtNombreCategoria);
    $sentencia->bindParam(':Descripcion', $txtDescripcion);
    $sentencia->bindParam(':Agregado', $txtFecha);
    $sentencia->execute();  
    
    break;

    case "btnEliminarCate":
        $sentencia = $pdo->prepare("DELETE  FROM  categoria WHERE idCategoria=:idCategoria");
        $sentencia->bindParam(':idCategoria', $txtidCategoria);
        $sentencia->execute();
        
    break;


    case "btnSalirCategoria":
        $mostrarModalCate = false;
    break;

    case "btnAbrirModal":
        $mostrarModalCate = true;
    break;






}
$sentencia = $pdo->prepare("SELECT * FROM `categoria` ");
$sentencia->execute();
$listaCategoria = $sentencia->fetchALL(PDO::FETCH_ASSOC);
?>