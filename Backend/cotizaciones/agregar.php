<?php

    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    if(isset($_POST['guardar'])){
        require_once("configCotizacion.php");

        $cotizaciones = new Cotizacion;

        $cotizaciones->setClienteId($_POST['clienteId']);
        $cotizaciones->setEmpleadoId($_POST['empleadoId']);
        $cotizaciones->setProductoId($_POST['productoId']);
        $cotizaciones->setFecha($_POST['fecha']);
        $cotizaciones->setHora($_POST['hora']);
        $cotizaciones->setDuracion($_POST['duracion']);
        $cotizaciones->insertData();

        echo'<script>alert("Guardado con exito"); window.location="cotizaciones.php"</script>';
    }  




?>