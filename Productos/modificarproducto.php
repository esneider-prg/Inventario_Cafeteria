<?php
require 'productos.php'
?>
<?php
require 'categoriabd.php'
?>

<?php


if ($_GET['id']) {
    $sentencia = $pdo->prepare("SELECT * FROM `productos` WHERE Codigo=:Codigo ");
    $sentencia->bindParam(':Codigo', $_GET['id']);
    $sentencia->execute();
    $listaProductos = $sentencia->fetchALL(PDO::FETCH_ASSOC);
}








/*  $sentencia = $pdo->prepare("SELECT * FROM `productos` WHERE id=:codigo");
          $sentencia->bindParam(':codigo', $id);
          $sentencia->execute();
          $listaCategoria = $sentencia->fetchALL(PDO::FETCH_ASSOC);

          print_r($listaCategoria);*/



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



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="width: 650px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo poducto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>



                        <div class="form-row">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" name="txtCodigo" value="<?php echo $txtCodigo; ?>" placeholder="Codigo producto" id="txtCodigo" require="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Nombre:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="Nombre producto" id="txtNombre" require="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Referencia:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="txtReferencia" value="<?php echo $txtReferencia; ?>" placeholder="Nombre Referencia" id="txtReferencia" require="">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Precio:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="txtPrecio" value="<?php echo $txtPrecio; ?>" placeholder="Precio de venta del producto" id="txtPrecio" require="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Peso:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="txtPeso" value="<?php echo $txtPeso; ?>" placeholder="peso" id="txtPeso" require="">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Categoria:</label>
                                    <div class="col-sm-10">

                                        <select name="txtid_categ" id="txtid_categ" require class="custom-select">


                                            <?php foreach ($listaCategoria as $Categoria) { ?>
                                                <option value="<?php echo $Categoria['idCategoria']; ?>"><?php echo $Categoria['NombreCategoria']; ?></option>

                                            <?php } ?>
                                        </select>

                                        <input type="hidden" class="form-control" value="<?php echo $Categoria['idCategoria']; ?>" placeholder="Seleccione une categoria" require="">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Stock:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="txtStockini" value="<?php echo $txtStockini; ?>" placeholder="Inventario inicial" id="txtStockini" require="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Imagen:</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" accept="image/*" name="txtImagen" value="<?php echo $txtImagen; ?>" placeholder="" id="txtImagen" require="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!--<button value="btnAgregar" class="btn btn-success" type="submit" name="accion">Agregar</button>-->
                                <button value="btnCancelar" class="btn btn-light" type="submit" name="accion">Cancelar</button>
                                <button value="btnModificar" class="btn btn-primary" type="submit" name="accion">Actualizar Datos</button>
                                <!--<button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>-->

                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body text-success">
                <h5 class="card-title">

                </h5>
                <p class="card-text">
                <table class="table">

                    </p>
            </div>

    </div>

    </form>






    <?php foreach ($listaProductos as $producto) { ?>



        <div style="padding-left: 200px" class="card" style="max-width: 1000px;">
            <div class="row no-gutters">

                <img class="card-img-top" ; style="width: 242px" height="190px" src=<?php echo $producto['Imagen']; ?>>

                <div class="col-md-8">
                    <div class="card-body text-dark">
                        <h5 class="card-title"><?php echo $producto['Nombre']; ?></h5>
                        <h5 class="card-text"> <?php echo $producto['Codigo']; ?> </h5>
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
                <input type="hidden" name="txtReferencia" value="<?php echo $producto['Referencia']; ?>">
                <input type="hidden" name="txtStockini" value="<?php echo $producto['Stockini']; ?>">
                <input type="hidden" name="txtPrecio" value="<?php echo $producto['Precio']; ?>">
                <input type="hidden" name="txtImagen" value="<?php echo $producto['Imagen']; ?>">


                <div><button value="btnEliminar" class="btn btn-danger" type="submit" name="accion"><i class="far fa-trash-alt"></i> Eliminar</button>
                    <button value="Editar" class="btn btn-primary" type="submit" name="accion"><i class="far fa-edit"></i> Editar</button>


                </div>

            </form>



        </div>
        </div>


        </div>

    <?php } ?>









    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <?php if ($mostrarModal) { ?>
        <script>
            $('#exampleModal').modal('show')
        </script>





    <?php } ?>







    </div>
</body>

</html>