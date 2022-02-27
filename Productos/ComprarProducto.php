<?php
require 'productos.php'
?>
<?php
require 'categoriabd.php'
?>
<?php
require 'DatosComprarProducto.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/all.js"></script>

<body>

    <?php
    include 'menu.php' ?>

    <div class="container" style="padding: 40px">
        <form accion="" method="post" enctype="multipart/form-data">
                <table class="table">
    </div>
    </form>

    <?php foreach ($listaProductos as $producto) { ?>



        <div style="padding-left: 200px" class="card" style="max-width: 1000px;">
            <div class="row no-gutters">

                <img class="card-img-top" ; style="width: 242px" height="210px" src=<?php echo $producto['Imagen']; ?>>

                <div class="col-md-8">
                    <div class="card-body text-dark">
                        <h1 class="card-title"><?php echo $producto['Nombre']; ?></h1>
                        <p class="card-text"><small class="text">Stock disponible</small></p>
                        <h2 class="card-text"> <?php echo $producto['Stockini']; ?> </h2>
                        <p class="card-text"><small class="card-text">Precio venta</small></p>
                        <h2 class="card-text"> $ <?php echo $producto['Precio']; ?> </h2>
                    </div>
                </div>
            </div>


            <form action="" method="post">

                <input type="hidden" name="txtCodigo" value="<?php echo $producto['Codigo']; ?>">
                <input type="hidden" name="txtNombre" value="<?php echo $producto['Nombre']; ?>">
                <input type="hidden" name="txtid_categ" value="<?php echo $producto['id_categ']; ?>">
                <input type="hidden" name="txtStockini" value="<?php echo $producto['Stockini']; ?>">
                <input type="hidden" name="txtPrecio" value="<?php echo $producto['Precio']; ?>">
                <input type="hidden" name="txtImagen" value="<?php echo $producto['Imagen']; ?>">




            </form>



        </div>
        </div>


        </div>

    <?php } ?>



    <div class="row">

        <div>

            <div class="form-row">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-15">
                            <label for="" class="col-sm-2 col-form-label">Codigo:</label>
                            <input type="hidden" class="form-control" name="Idproducto" value="<?php echo $Idproducto; ?>" placeholder="Codigo producto" id="Idproducto" require="">
                        </div>
                    </div>
                    <div>
                        <label for="">Cantidad:</label>
                        <div>
                            <input type="text" class="form-control" name="txtCantidad_venta" value="<?php echo $txtCantidad_venta; ?>" placeholder="Cantidad Producto" id="txtCantidad_venta" require="">
                        </div>
                    </div>

                    <div>
                        <label for="">Detalles:</label>
                        <div>
                            <input type="text" class="form-control" name="txtComentario" value="<?php echo $txtComentario; ?>" placeholder="Detalles Producto" id="txtComentario" require="">
                        </div>
                    </div>

                    <div>

                        <div>
                            <button value="btnComprar" class="btn btn-success" type="submit" name="accion">Comprar</button>
                            <button value="btnCancelar" class="btn btn-danger" type="submit" name="accion">Cancelar</button>
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </div>
</body>

</html>