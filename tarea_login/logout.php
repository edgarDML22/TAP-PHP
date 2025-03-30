<?php
session_start();
include 'includes/functions/welcome_functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Se cierra la sesión -->
    <?php session_destroy()?>
    
    <p>¡Thanks for using our page!</p>
    <p>The session has been closed</p>
    
    <p>Do you want to log in again? <a href="login.php">Log in</a></p>
    <p>Do you want to register an user? <a href="signup.php">Sign Up</a></p>
</head>
<body>
    
</body>
</html>
