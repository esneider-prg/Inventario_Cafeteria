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
                            <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-edit"></i> Agregar nuevo poducto</h5>
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

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" name="txtDescripcion" value="<?php echo $txtDescripcion; ?>" placeholder="" id="txtDescripcion" require="">
                                    </div>
                                </div>
                            </div>
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









            <div class="card border-success mb-3" style="max-width: 80rem;" ;>
                <div class="card-header bg-transparent border-success">
                    <nav class="navbar navbar-light " style="background-color: #DFF0D8">
                        <form class="form-inline">


                            <input type="text" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome">
                            <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" type="button" style="background-color: #735515;"> <i class="fas fa-plus"></i> Agregar</i> </button>
                        </form>
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
                        <p class="card-text"> <a>Ref - </a> <?php echo $producto['Referencia']; ?> </p>
                        <p class="card-text"><a>Peso - </a> <?php echo $producto['peso']; ?> KG</p>
                        <p class="card-text"><a>Precio - </a><?php echo $producto['Precio']; ?></p>
                        <p class="card-text"><a>Categoria - </a> <?php echo $producto['NombreCategoria']; ?></p>
                        <p class="card-text">Stock - <a></a><?php echo $producto['Stockini']; ?></p>
                        <p class="card-text"><?php echo $producto['Fecha']; ?></p>


                        <form action="" method="post">

                            <input type="hidden" name="txtCodigo" value="<?php echo $producto['Codigo']; ?>">
                            <input type="hidden" name="txtNombre" value="<?php echo $producto['Nombre']; ?>">
                            <input type="hidden" name="txtid_categ" value="<?php echo $producto['id_categ']; ?>">
                            <input type="hidden" name="txtStockini" value="<?php echo $producto['Stockini']; ?>">
                            <input type="hidden" name="txtPrecio" value="<?php echo $producto['Precio']; ?>">
                            <input type="hidden" name="txtImagen" value="<?php echo $producto['Imagen']; ?>">
                            <input type="hidden" name="txtPeso" value="<?php echo $producto['peso']; ?>">





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