<?php
    require_once('configCotizacion.php');
    $record = new Cotizacion;

    if(isset($_GET['cotizacionId'])&& isset($_GET['req'])){
        $record -> setCotizacionId($_GET['cotizacionId']);
        $record ->delete();
        echo "<script>alert('Datos borrados exitosamente'); document.location='cotizaciones.php'</script>";
    }
?>