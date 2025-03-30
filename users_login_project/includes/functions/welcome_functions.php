<?php

    function verify_session() {
        session_start();
        // Verificar si hay una sesión activa
        if (!isset($_SESSION['username'])) {
            $_SESSION['error_message'] = "You don't have a session started, please log in the page first";
            header("Location: login.php");
            exit;
        }  
    }
    function welcome_message(){
        // Mostrar el mensaje de bienvenida
        echo "Welcome, " . $_SESSION['name'] . " " . $_SESSION['lastname'] . "!";
    }