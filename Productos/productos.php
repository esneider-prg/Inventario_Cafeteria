
<?php


//print_r($_POST)





$txtPeso = (isset($_POST['txtPeso'])) ? $_POST['txtPeso'] : "";
$txtCodigo = (isset($_POST['txtCodigo'])) ? $_POST['txtCodigo'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtCategoria = (isset($_POST['txtCategoria'])) ? $_POST['txtCategoria'] : "";
$txtPrecio = (isset($_POST['txtPrecio'])) ? $_POST['txtPrecio'] : "";
$txtStockini = (isset($_POST['txtStockini'])) ? $_POST['txtStockini'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$txtHora = (isset($_POST['txtHora'])) ? $_POST['txtHora'] : "";
$txtFecha = (isset($_POST['txtFecha'])) ? $_POST['txtFecha'] : "";
$txtReferencia = (isset($_POST['txtReferencia'])) ? $_POST['txtReferencia'] : "";
$txtid_categ = intval((isset($_POST['txtid_categ'])) ? $_POST['txtid_categ'] : "");
$txtCodigopro = (isset($_GET['txtCodigopro'])) ? $_GET['txtCodigopro'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


date_default_timezone_set('America/Mexico_city');
$txtFecha = date("Y-m-d H:i:s");
$txtHora = date("H:i:s");
$mostrarModal = false;



include("../Conexion/conexion.php");






switch ($accion) {

    case "btnAgregar":




        $sentencia = $pdo->prepare("INSERT INTO productos(Nombre,Referencia,Precio,Peso,id_categ,Stockini,Fecha,Hora,Imagen)
            VALUES (:Nombre,:Referencia,:Precio,:Peso,:id_categ,:Stockini,:Fecha,:Hora,:Imagen)");


        $sentencia->bindParam(':Nombre', $txtNombre);
        $sentencia->bindParam(':Referencia', $txtReferencia);
        $sentencia->bindParam(':Precio', $txtPrecio);
        $sentencia->bindParam(':Peso', $txtPeso);
        $sentencia->bindParam(':id_categ', $txtid_categ);
        $sentencia->bindParam(':Stockini', $txtStockini);
        $sentencia->bindParam(':Fecha', $txtFecha);
        $sentencia->bindParam(':Hora', $txtHora);

        $dir_subida = 'C:/xampp/htdocs/developer/Inventario_Cafeteria/Imagenes/';

        $ruta_img = '/developer/Inventario_Cafeteria/Imagenes/' . $_REQUEST['txtCodigo'] . basename($_FILES['txtImagen']['name']);
        $fichero_subido = $dir_subida . $_REQUEST['txtCodigo'] . basename($_FILES['txtImagen']['name']);


        if (move_uploaded_file($_FILES['txtImagen']['tmp_name'], $fichero_subido)) {
            echo "El fichero es válido y se subió con éxito.\n";
        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
            exit;
        }
        $sentencia->bindParam(':Imagen', $ruta_img);
        $sentencia->execute();


        header('Location: index.php');


        break;

    case "btnModificar":



        $sentencia = $pdo->prepare(" UPDATE productos SET 
        Nombre=:Nombre,
        Referencia=:Referencia,  
        Precio=:Precio,
        Peso=:Peso,
        Stockini=:Stockini,
        Fecha=:Fecha,
        Hora=:Hora,
        id_categ=:id_categ WHERE 
        Codigo=:Codigo");

        $sentencia->bindParam(':Nombre', $txtNombre);
        $sentencia->bindParam(':Referencia', $txtReferencia);
        $sentencia->bindParam(':Precio', $txtPrecio);
        $sentencia->bindParam(':Peso', $txtPeso);
        $sentencia->bindParam(':Stockini', $txtStockini);
        $sentencia->bindParam(':Fecha', $txtFecha);
        $sentencia->bindParam(':Hora', $txtHora);
        $sentencia->bindParam(':id_categ', $txtid_categ);




        $sentencia->bindParam(':Codigo', $txtCodigo);
        $sentencia->execute();


        $dir_subida = 'C:/xampp/htdocs/developer/Inventario_Cafeteria/Imagenes/';

        $ruta_img = '/developer/Inventario_Cafeteria/Imagenes/' . $_REQUEST['txtCodigo'] . basename($_FILES['txtImagen']['name']);
        $fichero_subido = $dir_subida . $_REQUEST['txtCodigo'] . basename($_FILES['txtImagen']['name']);

        if ($ruta_img != "") {

            move_uploaded_file($_FILES['txtImagen']['tmp_name'], $fichero_subido);
            $sentencia = $pdo->prepare(" UPDATE productos SET
           Imagen=:Imagen WHERE Codigo=:Codigo");
            $sentencia->bindParam(':Imagen', $ruta_img);
            $sentencia->bindParam(':Codigo', $txtCodigo);
            $sentencia->execute();
        }


        header('Location: index.php');
        break;
    case "btnEliminar":

        /* $dir_subida = 'C:/wamp64/www/Proyectos/Taller5/Imagenes/';
        $ruta_img = '/Proyectos/Taller5/Imagenes/' . basename($_FILES['txtImagen']['name']);
        $fichero_subido = $dir_subida  . basename($_FILES['txtImagen']['name']);

         echo $_FILES
         */

        $sentencia = $pdo->prepare("SELECT  Imagen FROM productos WHERE Codigo=:Codigo");
        $sentencia->bindParam(':Codigo', $txtCodigo);
        $sentencia->execute();
        $producto = $sentencia->fetch(PDO::FETCH_LAZY);

        // print_r($producto);

        if (isset($producto["Imagen"])) {

            if (file_exists("C:/xampp/htdocs/" . $producto["Imagen"])) {

                unlink("C:/xampp/htdocs/" . $producto["Imagen"]);
                print_r("no  se elimino");
            }
        }


        $sentencia = $pdo->prepare(" DELETE FROM productos WHERE Codigo=:Codigo AND id_categ=:id_categ ");
        $sentencia->bindParam(':Codigo', $txtCodigo);
        $sentencia->bindParam(':id_categ', $txtid_categ);
        $sentencia->execute();


        header('Location: index.php');


        echo $txtCodigo;

        echo "presionaste Eliminar";

        break;
    case "btnCancelar":
        echo $txtCodigo;
        header('Location: index.php');

        echo " presionaste Cancelar";
        break;

    case "Editar":
        $mostrarModal = true;
        break;
}

$sentencia = $pdo->prepare("SELECT * FROM `productos` INNER JOIN categoria ON productos.id_categ = idCategoria");
$sentencia->execute();
$listaProductos = $sentencia->fetchALL(PDO::FETCH_ASSOC);
//print_r($listaProductos);
