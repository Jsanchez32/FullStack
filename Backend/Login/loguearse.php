<?php

    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);
    
    error_reporting(E_ALL);


    session_start();

    if(isset($_POST['login'])){
        require_once('loginUser.php');

        $credenciales = new LoginUser;

        $credenciales->setEmail($_POST['email']);
        $credenciales->setPassword($_POST['password']);

        $login = $credenciales -> login();

        if($login){
            header('Location: ../productos/productos.php');
        }
        else{
            echo"<script> alert('Correo o contraseña incorrecta'); document.location='alquiartemis.php'</script>";
        }
    }

?>