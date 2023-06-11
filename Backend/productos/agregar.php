<?php

    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);

    if(isset($_POST['guardar'])){
        require_once("configProductos.php");

        $productos = new Producto;

        $productos->setNombreProducto($_POST['nombreProducto']);
        $productos->setPrecio($_POST['precio']);

        $productos->insertData();

        echo'<script>alert("Guardado con exito"); window.location="productos.php"</script>';
    }  




?>