<?php
include 'includes/functions/welcome_functions.php';
require_once 'db_config.php';
verify_session();

// Variables para mantener el estado del filtro
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';
$category_filter = isset($_GET['category']) ? $_GET['category'] : 'all';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="assets/styles/style-main-page.css">

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

    <div class="filter-container">
        <form method="get">
            <label for="sort">Ordenar por:</label>
            <select name="sort" id="sort">
                <option value="default" <?php if ($sort == 'default') echo 'selected'; ?>>Por defecto</option>
                <option value="price_asc" <?php if ($sort == 'price_asc') echo 'selected'; ?>>Menor a mayor precio</option>
                <option value="price_desc" <?php if ($sort == 'price_desc') echo 'selected'; ?>>Mayor a menor precio</option>
            </select>

            <label for="category">Filtrar por categoría:</label>
            <select name="category" id="category">
                <option value="all" <?php if ($category_filter == 'all') echo 'selected'; ?>>Todas las categorías</option>
                <?php
                // Obtener todas las categorías únicas de la base de datos
                $categories_sql = "SELECT DISTINCT category FROM products ORDER BY category ASC";
                $categories_result = $conn->query($categories_sql);

                if ($categories_result->num_rows > 0) {
                    while ($cat_row = $categories_result->fetch_assoc()) {
                        $categoria = htmlspecialchars($cat_row["category"]);
                        echo '<option value="' . $categoria . '"';
                        if ($category_filter == $categoria) echo 'selected';
                        echo '>' . $categoria . '</option>';
                    }
                }
                ?>
            </select>
            <button type="submit">Filtrar</button>
        </form>
    </div>


    <div class="cards-container">
        <?php
        $sql = "SELECT id, nameP, price, image FROM products";
        $where = '';
        $order_by = '';

        // Aplicar filtro de categoría
        if ($category_filter != 'all') {
            $where = " WHERE category = '" . $conn->real_escape_string($category_filter) . "'";
        }

        // Aplicar ordenamiento por precio
        if ($sort == 'price_asc') {
            $order_by = " ORDER BY price ASC";
        } elseif ($sort == 'price_desc') {
            $order_by = " ORDER BY price DESC";
        }

        $sql .= $where . $order_by;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nombre_producto = htmlspecialchars($row["nameP"]);
                $precio_producto = htmlspecialchars($row["price"]);
                $nombre_archivo_imagen = htmlspecialchars($row["image"]);
                $ruta_imagen = 'assets/images/products/' . $nombre_archivo_imagen;
                ?>
                <div class="card">
                    <h2><?php echo $nombre_producto; ?></h2>
                    <img src="<?php echo $ruta_imagen; ?>" alt="<?php echo $nombre_producto; ?>" class="product-image">
                    <p>Precio: $<?php echo $precio_producto; ?></p>
                </div>
                <?php
            }
        } else {
            echo "<p>No se encontraron productos con los criterios de filtro.</p>";
        }
        ?>
    </div>
</body>
</html>