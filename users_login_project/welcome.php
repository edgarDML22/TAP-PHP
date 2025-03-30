<?php
include 'includes/functions/welcome_functions.php';
verify_session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="assets/styles/style-welcome.css">
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome Page</h1>

        <div class="user-info-container">
            <p class="welcome-message"><?php welcome_message() ?></p>
            <form action="logout.php" method="post" class="logout-form">
                <button type="submit" class="logout-button">Log out</button>
            </form>
        </div>

        <div class="cards-container">
            <div class="card">
                <h2>Ping Pong Game</h2>
                <img src="assets/images/ping_pong_logo.jpeg" alt="Ping Pong">
                <a href="pages/proyecto_ping_pong/index.html">Ping Pong</a>
            </div>

            <div class="card">
                <h2>Paint Project</h2>
                <img src="assets/images/paint_logo.jpeg" alt="Paint"> 
                <a href="pages/proyecto_paint/index.html">Paint</a> 
            </div>

            <div class="card">
                <h2>Calculator</h2>
                <div class="calculator-image-container">
                    <img src="assets/images/calculator_logo.jpeg" alt="Calculadora">
                </div>
                <a href="pages/calculator_project/index.html">Calculator</a>
            </div>

            <div class="card">
                <h2>YouTube</h2>
                <div class="youtube-image-container">
                    <img src="assets/images/youtube_logo.png" alt="YouTube" >
                </div>
                <a href="https://www.youtube.com">YouTube Page</a>
            </div>

            <div class="card">
                <h2>Github Project</h2>
                <img src="assets/images/project_git_logo.jpeg" alt="GitHub" style="height: 35%">
                <a href="https://github.com/edgarDML22/TAP-PHP">GitHub Repository</a>
            </div>
        </div>
    </div>
</body>
</html>