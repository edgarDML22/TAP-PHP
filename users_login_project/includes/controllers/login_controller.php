<?php
session_start();
require_once '../../db_config.php'; // Incluir el archivo de configuración de la base de datos

// Verificar si hay una sesión activa o si llegaron datos por POST
if (!isset($_SESSION['username']) && (!isset($_POST['username']) || !isset($_POST['pass']))) {
    header("Location: ../../login.php");
    exit;
}

// Si el método es POST (login)
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = trim(htmlspecialchars($_POST["username"]));
    $password = trim(htmlspecialchars($_POST["pass"]));

    // Buscar el usuario en la base de datos por su username
    $stmt = $conn->prepare("SELECT id, username, pass, name, lastname FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verificar si la contraseña ingresada coincide con el hash almacenado
        if (password_verify($password, $user['pass'])) {
            // Iniciar sesión si la contraseña es correcta
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['lastname'] = $user['lastname'];
            $stmt->close();
            $conn->close();
            header("Location: ../../welcome.php");
            exit;
        } else {
            $_SESSION['error_message'] = "Username or Password Incorrect.";
            $stmt->close();
            $conn->close();
            header("Location: ../../login.php");
            exit;
        }
    } else {
        $_SESSION['error_message'] = "Username or Password Incorrect.";
        $stmt->close();
        $conn->close();
        header("Location: ../../login.php");
        exit;
    }
}
?>