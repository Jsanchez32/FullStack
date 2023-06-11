<?php

    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    require_once('configCotizacion.php');
    require_once('../productos/configProductos.php');
    require_once('../clientes/configClientes.php');
    require_once('../Login/loginUser.php');

    $productos = new Producto();
    $clientes = new Cliente();
    $empleado = new LoginUser();
    $data = new Cotizacion();

    $all = $data->selectId();
    $allProductos = $productos->selectAll();
    $allClientes = $clientes->selectAll();
    $allEmpleados = $empleado->fetchAll();

    require_once('../Login/loginUser.php');
    session_start();

    if(!$_SESSION['username'] || !$_SESSION['empleadoId']){
      header('Location: ../Login/alquiartemis.php');
      exit();
    }

    if(isset($_POST['logOut'])){
      unset($_SESSION['empleadoId']);
      unset($_SESSION['username']);
      header('Location: ../Login/alquiartemis.php');
      exit();
    }



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/cotizaciones.css">
</head>
<body>
    
    <div class="contenedor">
        <div class="laterarIzquierdo">
            <div class="perfil">
                <h2>Cotizacion</h2>
                <img class="imagen" src="../img/luffy.jpeg" alt="">
                <p><?php echo $_SESSION['username']?></p>
            </div>

        <div class="menus">
            <a href="../clientes/clientes.php" style="display: flex;gap:1px;">
            <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
            </a>
            <a href="../productos/productos.php" style="display: flex;gap:1px;">
            <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
            </a>
            <a href="../cotizaciones/cotizaciones.php" style="display: flex;gap:1px;">
            <h3 style="margin: 0px;font-weight: 800;">Cotizacion</h3>
            </a>

            <form action="" method="post" class="salir">
                <input class="btn btn-danger " type="submit" value="logOut" name="logOut">
            </form>
        </div>
        </div>
        <div class="contenido">
            <h2>Cotizacion</h2>
            <button data-bs-toggle="modal" class="btn" data-bs-target="#exampleModal"><img src="../img/mas.png" alt=""></button>
            <div class="tabla">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Cliente</th>
                    <th scope="col">Empleado</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Duracion Dias</th>
                    <th scope="col">Total</th>
                    <th scope="col">Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($all as $Key=> $val ){
                    ?>
                    <tr>
                    <td><?php echo $val['cotizacionId']?> </td>
                    <td><?php echo $val['nombre']?> </td>
                    <td><?php echo $val['username']?> </td>
                    <td><?php echo $val['nombreProducto']?> </td>
                    <td><?php echo $val['fecha']?> </td>
                    <td><?php echo $val['hora']?> </td>
                    <td><?php echo $val['duracion']?> </td>
                    <td><?php echo $val['duracion']*$val['precio']?> </td>
                    <td>
                        <a class="btn btn-danger" href="borrar.php?cotizacionId=<?=$val['cotizacionId']?>&req=delete">Borrar</a>
                        <a class="btn btn-warning" href="actualizar.php?cotizacionId=<?=$val['cotizacionId']?>">Actualizar</a>
                    </td>
                    </tr>
                    <?php }; ?>
            </tbody>
                </table>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Cotizacion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="agregar.php" method="post">
                <div>
                        <label for="" class="form-label">Cliente</label>
                        <select name="clienteId" id="clienteId" class="form-select">
                            <?php
                                foreach ($allClientes as $key => $value) {
                            ?>
                            <option value="<?php echo $value['clienteId']?>"><?php echo $value['nombre']?></option>
                            <?php }; ?>
                        </select>
                    </div>

                    <div>
                        <label for="" class="form-label">EmpleadoId</label>
                        <select name="empleadoId" id="empleadoId" class="form-select">
                            <?php
                                foreach ($allEmpleados as $key => $value) {
                            ?>
                            <option value="<?php echo $value['empleadoId']?>"><?php echo $value['username']?></option>
                            <?php }; ?>
                        </select>
                    </div>

                    <div>
                        <label for="" class="form-label">Producto</label>
                        <select name="productoId" id="productoId" class="form-select">
                            <?php
                                foreach ($allProductos as $key => $value) {
                            ?>
                            <option value="<?php echo $value['productoId']?>"><?php echo $value['nombreProducto']?></option>
                            <?php }; ?>
                        </select>
                    </div>

                    <div>
                        <label for="" class="form-label">Fecha</label>
                        <input type="date" name="fecha" id="fecha" class="form-control">
                    </div>

                    <div>
                        <label for="" class="form-label">Hora</label>
                        <input type="time" name="hora" id="hora" class="form-control">
                    </div>

                    <div>
                        <label for="" class="form-label">Duracion</label>
                        <input type="number" name="duracion" id="duracion" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="guardar" value="Guardar" action="agregar.php">
                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>