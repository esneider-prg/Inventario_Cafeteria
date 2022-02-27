<?php
require 'productos.php'
?>

<?php
require 'categoriabd.php'
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/all.js"></script>

<body>

    <?php
    include 'menu.php' ?>


    <div class="container">
        <form accion="" method="post" enctype="multipart/form-data">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="width: 650px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-edit"></i> Comprar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>



                        <div class="form-row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <?php foreach ($listaProductos as $producto) { ?>

                                    <tr>

                                        <td> <img class="img-thumbnail" width="100px" src="<?php echo $producto['Imagen']; ?>" /> </td>
                                        <td><?php echo $producto['Nombre']; ?></td>
                                        <td><?php echo $producto['Precio']; ?></td>
                                        <td>

                                            <form action="" method="post">

                                                <input type="hidden" name="txtID" value="<?php echo $producto['Codigo']; ?>">


                                                <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Comprar</button>
                                        </td>

        </form>

        </tr>



    <?php } ?>
    </table>
    <div class="col-sm-10">

        <div class="col-sm-8">
            <button value="btnAgregar" class="btn btn-success" type="submit" name="accion">Agregar</button>
            <button value="btnCancelar" class="btn btn-danger" type="submit" name="accion">Cancelar</button>
        </div>
    </div>


    </div>
    </div>
    </div>
    </div>

    <!-- Button trigger modal -->
















    </form>
    </div>
    <div class="card-body text-success">
        <h5 class="card-title">

        </h5>
        <p class="card-text">
        <table class="table">

            </p>
    </div>


    </form>






    <div class="row">
        <?php foreach ($listaProductos as $producto) { ?>



            <div class="col-3">
                <div class="card">
                    <h5 class="card-title text-dark"><?php echo $producto['Nombre']; ?></h5>
                    <a href="modificarproducto.php?id=<?php echo $producto['Codigo'] ?>"> <img class="card-img-top" style="width: 242px" height="190px" src=<?php echo $producto['Imagen']; ?>></a>
                    <div class="card-body text-dark">



                        <form action="" method="post">

                            <input type="hidden" name="txtCodigo" value="<?php echo $producto['Codigo']; ?>">
                            <input type="hidden" name="txtNombre" value="<?php echo $producto['Nombre']; ?>">
                            <input type="hidden" name="txtid_categ" value="<?php echo $producto['id_categ']; ?>">
                            <input type="hidden" name="txtStockini" value="<?php echo $producto['Stockini']; ?>">
                            <input type="hidden" name="txtPrecio" value="<?php echo $producto['Precio']; ?>">

                            <input type="hidden" name="txtPeso" value="<?php echo $producto['peso']; ?>">



                            <a value="btnComprar" class="btn btn-danger" type="submit" name="accion" href="ComprarProducto.php?id=<?php echo $producto['Codigo'] ?>"><i class="fa fa-cart-plus"></i>Comprar</i></a>



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