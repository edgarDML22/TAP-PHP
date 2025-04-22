<?php
session_start();
require_once '../../db_config.php'; // Incluir el archivo de configuración de la base de datos

// Verificar si el formulario fue enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = trim(htmlspecialchars($_POST["pass"]));
    $confirm_password = trim(htmlspecialchars($_POST["confirm_pass"]));

    // Verificar si las contraseñas coinciden
    if ($password != $confirm_password) {
        $_SESSION['error_message'] = "Passwords do not match.";
        $_SESSION['signup_name'] = $name;
        $_SESSION['signup_lastname'] = $lastname;
        $_SESSION['signup_username'] = $username;
        header("Location: ../../signup.php");
        exit;
    }

    // **IMPORTANTE: Encriptar la contraseña antes de guardarla**
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Verificar si el nombre de usuario ya existe en la base de datos
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error_message'] = "Username already taken.";
        $_SESSION['signup_name'] = $name;
        $_SESSION['signup_lastname'] = $lastname;
        $_SESSION['signup_username'] = $username;
        $stmt->close();
        header("Location: ../../signup.php");
        exit;
    }
    $stmt->close();

    // Insertar el nuevo usuario en la base de datos
    $stmt = $conn->prepare("INSERT INTO users (name, lastname, username, pass) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $lastname, $username, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Registration successful! You can now log in.";
        $stmt->close();
        header("Location: ../../login.php");
        exit;
    } else {
        $_SESSION['error_message'] = "Error during registration. Please try again.";
        $stmt->close();
        header("Location: ../../signup.php");
        exit;
    }

    $conn->close();
}
?>