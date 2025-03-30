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
    <link rel="stylesheet" href="assets/styles/style-logout.css">
    
</head>
<body>
    <!-- Se cierra la sesión -->
    <?php session_destroy()?>
    
    <h1>Log out</h1>
    <h2>The session has been closed</h2>
    <p>¡Thanks for using our page! :)</p>
    <!-- ponerlos en un mismo div igual cargados hacia algún lado -->
    <div class="cards-container">   
        <div class="card">
        <p>Do you want to log in again? </p>
        <a href="login.php">Log in</a>
        </div>
        <div class="card">
            <p>Do you want to register an user? </p>
            <a href="signup.php">Sign Up</a>
        </div>
    </div>
</body>
</html>
