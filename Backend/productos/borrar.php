<?php
    require_once('configProductos.php');
    $record = new Producto;

    if(isset($_GET['productoId'])&& isset($_GET['req'])){
        $record -> setProductoId($_GET['productoId']);
        $record ->delete();
        echo "<script>alert('Datos borrados exitosamente'); document.location='productos.php'</script>";
    }
?>