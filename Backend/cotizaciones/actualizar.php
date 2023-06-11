<?php
   require_once("configCotizacion.php");
   require_once('../productos/configProductos.php');
   require_once('../clientes/configClientes.php');
   require_once('../Login/loginUser.php');

   $data = new Cotizacion();
   $producto = new Producto();
   $cliente = new Cliente();
   $empleado = new LoginUser();

   $id= $_GET['cotizacionId'];
   $data->setCotizacionId($id);

   $record = $data->selectOne();

   $allProductos = $producto->selectAll();
   $allClientes = $cliente->selectAll();
   $allEmpleado = $empleado->fetchAll ();
   $values = $record[0];


    if(isset($_POST['editar'])){
        $data-> setClienteId($_POST['clienteId']);
        $data-> setEmpleadoId($_POST['empleadoId']);
        $data-> setProductoId($_POST['productoId']);
        $data-> setFecha($_POST['fecha']);
        $data-> setHora($_POST['hora']);
        $data-> setDuracion($_POST['duracion']);
        $data-> setTotal($_POST['total']);
          
        $data-> update();

        echo "<script>alert('Datos actualizados exitosamente'); document.location='cotizaciones.php'</script>";
      }
?>  




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/cotizaciones.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="contenedor">    
        <div class="laterarIzquierdo">
            <div class="perfil">
                <h2>Cotizacion</h2>
                <img class="imagen" src="../img/luffy.jpeg" alt="">
                <p>Juan Sanchez</p>
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
        </div>
    </div>
        <div class="contenido">
            <h2>Cotizacion</h2>
            <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">

            <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Nombre Cliente</label>
                    <select name="clienteId" id="clienteId" class="form-select">
                        <?php
                            foreach ($allClientes as $key => $value) {
                        ?>
                        <option value="<?php echo $value['clienteId']?>"><?php echo $value['nombre']?></option>
                        <?php };?>
                    </select>
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Producto</label>
                    <select name="productoId" id="productoId" class="form-select">
                        <?php
                            foreach ($allProductos as $key => $value) {
                        ?>
                        <option value="<?php echo $value['productoId']?>"><?php echo $value['nombreProducto']?></option>
                        <?php };?>
                    </select>
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Empleado</label>
                    <select name="empleadoId" id="empleadoId" class="form-select">
                        <?php
                            foreach ($allEmpleado as $key => $value) {
                        ?>
                        <option value="<?php echo $value['empleadoId']?>"><?php echo $value['username']?></option>
                        <?php };?>
                    </select>
              </div>


              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Fecha</label>
                <input 
                  type="date"
                  id="fecha"
                  name="fecha"
                  class="form-control"  
                  value= "<?php echo $values['fecha'];?>" 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Hora</label>
                <input 
                  type="time"
                  id="hora"
                  name="hora"
                  class="form-control"  
                  value= "<?php echo $values['hora'];?>" 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Duracion Dias</label>
                <input 
                  type="number"
                  id="duracion"
                  name="duracion"
                  class="form-control"  
                  value= "<?php echo $values['duracion'];?>" 
                />
              </div>



              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
        </div>
    </div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>