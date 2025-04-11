<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas Dulces - Restaurante Xejasmin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
    <style>
        header {
            background: linear-gradient(90deg, #ff7eb3, #ff758c);
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            color: #ff758c;
        }
        footer {
            background: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>
    <header class="text-white py-4">
        <div class="container">
            <h1 class="text-center">Restaurante Xejasmin</h1>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><a class="nav-link" href="../index.html">Inicio</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    
    <main class="container my-5">
        <h1 class="text-center mb-4">Recetas Dulces de Guatemala</h1>
        
        <?php
        $file_path = 'recetadulce.txt';

        if (file_exists($file_path)) {
            $recetas = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($recetas as $receta) {
                list($titulo, $ingredientes, $pasos) = explode('|', $receta);
                echo "<article class='card mb-4'>";
                echo "<div class='card-body'>";
                echo "<h2 class='card-title'>$titulo</h2>";
                echo "<p class='card-text'><strong>Ingredientes:</strong> $ingredientes</p>";
                echo "<p class='card-text'><strong>Pasos:</strong> $pasos</p>";
                echo "</div>";
                echo "</article>";
            }
        } else {
            echo "<p class='text-danger text-center'>No se encontraron recetas dulces.</p>";
        }
        ?>
    </main>
    
    <footer class="text-center py-4">
        <p>&copy; 2025 Restaurante Xejasmin. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>