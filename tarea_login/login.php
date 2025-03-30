<?php
session_start();
include 'includes/functions/signup_functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <h1>USER LOGIN</h1>
    <!-- mensajes de estado -->
    <?php show_error_or_success_message()?>

    <!-- un forms donde pidamos usuario y contraseña -->
     <form action="includes/controllers/login_controller.php" method="post">
        <label for="username">Username</label>
        <input required type="text" id="username" name="username" value="" placeholder="Username">
        <br><br>
        <label for="pass">Password</label>
        <input required type="password" id="pass" name="pass" placeholder="Password">
        <br><br>
        <button type="submit">LOGIN</button>
     </form>

    <!-- Botón para ir a la página de signup -->
    <p>Do you want to register an user? <a href="signup.php"><button type="button">Sign Up</button></a></p>
</body>
</html>