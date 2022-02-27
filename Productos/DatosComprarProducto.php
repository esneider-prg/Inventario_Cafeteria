<?php


if ($_GET['id']) {
    $sentencia = $pdo->prepare("SELECT * FROM `productos` WHERE Codigo=:Codigo ");
    $sentencia->bindParam(':Codigo', $_GET['id']);
    $sentencia->execute();
    $listaProductos = $sentencia->fetchALL(PDO::FETCH_ASSOC);
}
foreach ($listaProductos as $producto) {
$txtNombreProducto = $producto["Nombre"];
$txtValor_venta = $producto["Precio"];  
$txtStockinit = intval($producto["Stockini"]);  
}

$txtCantidad_venta = (isset($_POST['txtCantidad_venta'])) ? $_POST['txtCantidad_venta'] : "";
$txtComentario = (isset($_POST['txtComentario'])) ? $_POST['txtComentario'] : "";    
$Idproducto = (isset($_GET['id'])) ? $_GET['id'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

$Valor_venta = intval($txtValor_venta);
$Cantidad_venta = intval($txtCantidad_venta);

$valorventa = $Valor_venta * $Cantidad_venta;


    switch ($accion) {
    
            case "btnComprar":
            
                 
                if ($txtStockinit!=0 && $txtStockinit>=$Cantidad_venta) {
                   
                    $sentencia = $pdo->prepare("INSERT INTO ventas(`NombreProducto`, `cantidad_venta`, `comentario`, `valor_venta`, `Idproducto`)
                    VALUES (:NombreProducto,:cantidad_venta,:comentario,:valor_venta,:Idproducto)");
            
            
                    $sentencia->bindParam(':NombreProducto', $txtNombreProducto);
                    $sentencia->bindParam(':cantidad_venta', $txtCantidad_venta);
                    $sentencia->bindParam(':comentario', $txtComentario);
                    $sentencia->bindParam(':valor_venta', $valorventa);
                    $sentencia->bindParam(':Idproducto', $Idproducto);
                    $sentencia->execute();

                    $RestaStock = $txtStockinit - $txtCantidad_venta;


                    $sentencia = $pdo->prepare(" UPDATE productos SET
                    Stockini=:Stockini WHERE 
                    Codigo=:Codigo");
            
                    $sentencia->bindParam(':Stockini', $RestaStock);
                    $sentencia->bindParam(':Codigo', $Idproducto);
                    $sentencia->execute();

                    header('Location: index.php');
                }else
                {
                    echo "No se puede realizar la venta por que no hay stock disponible";
                    header('Refresh: 5; URL=http://localhost/developer/Inventario_Cafeteria/Productos/index.php');
                }

                break;
        
        
      
    }

?>