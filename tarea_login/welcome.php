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
    
</head>
<body>
<h6>CONTENT JIJIJIJA</h6>

<!-- En la esquina superior derecha -->
<form action="logout.php" method="post">
    <button type="submit">Log out</button>
</form>

<p><?php welcome_message() ?></p>
<!-- Poner los 3 trabajos que has hecho hasta el momento -->
<a href="pages/proyecto_ping_pong/index.html">Juego de Ping Pong</a>
<a href="pages/proyecto_paint/index.html">Trabajo de Paint</a>
<a href="pages/proyecto_calculadora/index.html">Calculadora</a>
<a href="https://www.youtube.com">YouTube</a>
<a href="https://github.com/edgarDML22/TAP-PHP">GitHub del Proyecto</a>

</body>
</html>