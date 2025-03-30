<?php
    session_start();
    // Verificar si hay una sesión activa o si llegaron datos por POST
    if (!isset($_SESSION['username']) && (!isset($_POST['username']) || !isset($_POST['pass']))) {
        header("Location: ../../login.php");
        exit;
    }

    // Si el método es POST (login)
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = trim(htmlspecialchars($_POST["username"]));
        $password = trim(htmlspecialchars($_POST["pass"]));

        // Leer y decodificar el archivo JSON
        $json_data = file_get_contents('../../users.json');
        $users = json_decode($json_data, true);

        //Primero ver si el JSON está vacío 
        if ($users === null) {
            session_start();
            $_SESSION['error_message'] = "There are no users registered in the system.";
            header("Location: ../../login.php");
            exit;
        }

        //continuamos para revisar si hay coincidencias en el JSON file
        $valid_user = false;
        foreach ($users as $user) {
            if ($user['username'] == $username && $user['password'] == $password) {
                $valid_user = true;
                // Iniciar sesión si el usuario y la contraseña coinciden
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $user['name'];
                $_SESSION['lastname'] = $user['lastname'];
                header("Location: ../../welcome.php");
                exit;
            }
        }
        if ($valid_user == false){
            $_SESSION['error_message'] = "Username or Password Incorrect.";
            header("Location: ../../login.php");
            exit;
        }
    }