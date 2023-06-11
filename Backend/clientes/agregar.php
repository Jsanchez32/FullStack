<?php

    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    if(isset($_POST['guardar'])){
        require_once("configClientes.php");

        $clientes = new Cliente;

        $clientes->setNombre($_POST['nombre']);
        $clientes->setTelefono($_POST['telefono']);
        $clientes->setProductoId($_POST['productoId']);
        $clientes->setFecha($_POST['fecha']);
        $clientes->setHora($_POST['hora']);

        $clientes->insertData();

        echo'<script>alert("Guardado con exito"); window.location="clientes.php"</script>';
    }  




?>