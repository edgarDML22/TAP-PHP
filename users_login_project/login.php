<?php
session_start();
include 'includes/functions/signup_functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style-login.css">
    <title>Log in</title>
</head>
<body> 
    <!-- mensajes de estado -->
    <?php if (isset($_SESSION['error_message']) || isset($_SESSION['success_message'])): ?>
            <?php show_error_or_success_message(); ?>
    <?php endif; ?>
    
    <div class="main_container">
    <h1>USER LOGIN</h1>
    <!-- un forms donde pidamos usuario y contraseña -->
    <form action="includes/controllers/login_controller.php" method="post">
    <div style="display: flex; align-items: center; margin-bottom: 1px; padding: 6px;">
        <input required type="text" id="username" name="username" value="" placeholder="Username" style="vertical-align: middle;">
        <img src="assets/images/user_logo.jpg" alt="Usuario" style="padding: 6px; width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
    </div>

    <div style="display: flex; align-items: center; margin-bottom: 6px; padding: 6px;">
        <input required type="password" id="pass" name="pass" placeholder="Password" style="vertical-align: middle;">
        <img src="assets/images/padlock_logo.jpg" alt="Contraseña" style="padding:6px; width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
    </div>

    <button type="submit" class="send_button">LOGIN</button>
    </form>
    </div>

    <div class="signup_container">
        <!-- Botón para ir a la página de signup -->
        <p>You don't have an account yet? </p>
        <a href="signup.php" class="signup-button">SIGN UP</a>
    </div>
    
</body>
</html>