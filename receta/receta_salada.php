<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas Saladas de Guatemala - Restaurante Xejasmin</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

    <header>
        <h1>Restaurante Xejasmin</h1>
        <nav>
            <ul>
                <li><a href="../index.html">Inicio</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Recetas Saladas de Guatemala</h2>
        
        <?php
        $file_path = 'recetasalada.txt';

        if (file_exists($file_path)) {
            $recetas = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($recetas as $receta) {

                list($titulo, $ingredientes, $pasos) = explode('|', $receta);
                echo "<article>";
                echo "<h3>$titulo</h3>";
                echo "<p><strong>Ingredientes:</strong> $ingredientes</p>";
                echo "<p><strong>Pasos:</strong> $pasos</p>";
                echo "</article>";
            }
        } else {
            echo "<p>No se encontraron recetas saladas.</p>";
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2025 Restaurante Xejasmin </p>
    </footer>

</body>
</html>