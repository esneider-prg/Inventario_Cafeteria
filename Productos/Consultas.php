<?php

include("../Conexion/conexion.php");




$sentencia = $pdo->prepare("SELECT ventas.Idproducto,ventas.NombreProducto,SUM(1) AS Masvendido FROM ventas GROUP BY ventas.Idproducto ORDER BY `Masvendido` DESC LIMIT 1;");
$sentencia->execute();
$productos = $sentencia->fetchALL(PDO::FETCH_ASSOC);


$sentencia = $pdo->prepare("SELECT * FROM productos ORDER by Stockini DESC LIMIT 1;");
$sentencia->execute();
$productos1 = $sentencia->fetchALL(PDO::FETCH_ASSOC);
?>