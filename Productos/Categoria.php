<?php
require 'AgregarCategoria.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="js/all.js"></script> 
</head>

<body>
    <?php
    include 'menu.php' ?>
    <?php
require 'productos.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

<body>

   

    <div class="container">
        <form accion="" method="post" enctype="multipart/form-data">



            <!-- Modal -->
            <div class="modal fade" id="MODALCATE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <label for="" class="col-sm-2 col-form-label">Nombre:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="txtNombreCategoria" value="<?php echo $txtNombreCategoria; ?>" placeholder="Nombre producto" id="txtNombreCategoria" require="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Descripcion:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="txtDescripcion" value="<?php echo $txtDescripcion; ?>" placeholder="Descripcion producto " id="txtDescripcion" require="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">id</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" name="txtidCategoria" value="<?php echo $txtidCategoria; ?>" placeholder="Descripcion producto " id="txtidCategoria" require="">
                                    </div>
                                </div>

                            </div>
                            


                        </div>
                        <div class="modal-footer">
                                
                               <!-- <button value="btnModificar" class="btn btn-warning" type="hidden" name="accion">Modificar</button>
                                <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>-->
                                <button value="btnSalirCategoria" class="btn btn-light" type="submit" name="accionC">Cancelar</button>
                                <button value="btnAgregarCategoria" class="btn btn-primary" type="submit" name="accionC">Guardar Datos</button>
                            </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->

            <div class="card border-success mb-3" style="max-width: 80rem;" ;>
                <div class="card-header bg-transparent border-success">
                    <nav class="navbar navbar-light " style="background-color: #DFF0D8">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" style="width: 200px" style="color: red" placeholder="Search" aria-label="Search">
                            <button value="btnAbrirModal" class="btn btn-success" data-toggle="modal" data-target="#MODALCATE" type="button">Nueva Categoria </button>
                        </form>
        </form>
    </div>
  
    </form>
      
        <div class="card-body text-success">
            <h5 class="card-title">

            </h5>
            <p class="card-text">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Agregado</th>
                        </tr>

                    </thead>
            </p>
        </div>


        <?php foreach ($listaCategoria as $Categoria) { ?>
            <tr><td> <?php echo $Categoria['NombreCategoria']; ?> </td>
        <td> <?php echo $Categoria['Descripcion']; ?> </td>
        <td> <?php echo $Categoria['Agregado']; ?> </td>
        <td>         
    </td>

        <form action="" method="post">

            
            <input type="hidden" name="txtNombre" value="<?php echo $Categoria['NombreCategoria']; ?>">
            <input type="hidden" name="txtDescripcion" value="<?php echo $Categoria['Descripcion']; ?>">
            <input type="hidden" name="txtAgregado" value="<?php echo $Categoria['Agregado']; ?>">
            <input type="hidden" name="txtidCategoria" value="<?php echo $Categoria['idCategoria']; ?>">
            

            
        </form></tr>
        

          

        
        </th>

        
        <?php } ?>
    








    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <?php if ($mostrarModalCate) { ?>
        <script>
            $('#MODALCATE').modal('show')
        </script>
        <?php } ?>
</body>

</html>