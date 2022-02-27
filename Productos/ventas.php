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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/all.js"></script>

<body>

    <?php
    include 'menu.php' ?>

    <div class="row">

        <div>
            <?php
            require 'consultas.php'
            ?>
        </div>


    </div>

    <div class="row">

        <table class="table">
            <thead>
                <tr>
                    <th>Idproducto</th>
                    <th>NombreProducto</th>
                    <th>Masvendido</th>

                </tr>
            </thead>
            <?php foreach ($productos as $producto) { ?>

                <tr>
                    <td><?php echo $producto['Idproducto']; ?></td>
                    <td><?php echo $producto['NombreProducto']; ?></td>
                    <td><?php echo $producto['Masvendido']; ?></td>
                    <td>
                    </td>
                </tr>



            <?php } ?>
        </table>


    </div>









    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <?php if ($mostrarModal) { ?>
        <script>
            $('#exampleModal').modal('show')
        </script>





    <?php } ?>
    </div>

    <div class="row">

        <table class="table">
            <thead>
                <tr>
                    <th>Idproducto</th>
                    <th>NombreProducto</th>
                    <th>MasStock</th>

                </tr>
            </thead>
            <?php foreach ($productos1 as $producto) { ?>

                <tr>
                    <td><?php echo $producto['Codigo']; ?></td>
                    <td><?php echo $producto['Nombre']; ?></td>
                    <td><?php echo $producto['Stockini']; ?></td>
                    <td>
                    </td>
                </tr>



            <?php } ?>
        </table>


    </div>









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