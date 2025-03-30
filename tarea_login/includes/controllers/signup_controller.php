<?php
session_start();

// Verificar si el formulario fue enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = trim(htmlspecialchars($_POST["pass"]));
    $confirm_password = trim(htmlspecialchars($_POST["confirm_pass"]));

    // Leer el archivo JSON de usuarios
    $json_data = file_get_contents('../../users.json');
    $users = json_decode($json_data, true);

    // Verificar si el archivo JSON está vacío
    if ($users === null) {
        $users = [];  // Inicializar el array si está vacío
    }

    // Verificar si el nombre de usuario ya existe
    foreach ($users as $user) {
        if ($user['username'] == $username) {
            $_SESSION['error_message'] = "Username already taken.";
            $_SESSION['signup_name'] = $name;
            $_SESSION['signup_lastname'] = $lastname;
            $_SESSION['signup_username'] = $username;
            header("Location: ../../signup.php");
            exit;
        }
    }

    // Verificar si las contraseñas coinciden
    if ($password != $confirm_password) {
        $_SESSION['error_message'] = "Passwords do not match.";
        $_SESSION['signup_name'] = $name;
        $_SESSION['signup_lastname'] = $lastname;
        $_SESSION['signup_username'] = $username;
        header("Location: ../../signup.php");
        exit;
    }

    // Crear un nuevo usuario
    $new_user = [
        "name" => $name,
        "lastname" => $lastname,
        "username" => $username,
        "password" => $password  // En una aplicación real, deberías encriptar la contraseña.
    ];

    // Agregar el nuevo usuario al array de usuarios
    $users[] = $new_user;

    // Guardar el array actualizado en el archivo JSON
    file_put_contents('../../users.json', json_encode($users, JSON_PRETTY_PRINT));

    // Redirigir al usuario al login con mensaje de éxito
    $_SESSION['success_message'] = "Registration successful! You can now log in.";
    header("Location: ../../login.php");
    exit;
}