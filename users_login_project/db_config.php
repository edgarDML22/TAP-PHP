<?php
define('DB_HOST', 'localhost'); // Generalmente 'localhost' si tu servidor MySQL está en la misma máquina
define('DB_USER', 'edgar22'); // Tu nombre de usuario de MySQL
define('DB_PASS', 'ChocoPHP22*'); // Tu contraseña de MySQL
define('DB_NAME', 'login_project'); // El nombre de la base de datos que creaste en phpMyAdmin

// Establecer la conexión a la base de datos
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificar si la conexión tuvo éxito
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Opcional: Establecer el charset a UTF-8 para evitar problemas con caracteres especiales
$conn->set_charset("utf8");
?>