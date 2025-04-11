<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $campos_obligatorios = ['nombre', 'telefono', 'fecha', 'hora', 'descripcion'];
    foreach ($campos_obligatorios as $campo) {
        if (empty($_POST[$campo])) {
            echo "<div class='alert alert-danger'>El campo $campo es obligatorio.</div>";
            exit;
        }
    }

    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $fecha = htmlspecialchars($_POST['fecha']);
    $hora = htmlspecialchars($_POST['hora']);
    $descripcion = htmlspecialchars($_POST['descripcion']);

    if (!preg_match('/^\d{7,15}$/', $telefono)) {
        echo "<div class='alert alert-danger'>El número de teléfono no es válido. Debe contener entre 7 y 15 dígitos.</div>";
        exit;
    }

    $reserva = "Nombre: $nombre\nTeléfono: $telefono\nFecha: $fecha\nHora: $hora\nDescripción: $descripcion\n-----------------------------\n";

    $archivo = 'reservaciones.txt';
    if (file_put_contents($archivo, $reserva, FILE_APPEND) !== false) {
        echo "<div class='alert alert-success'>Reserva guardada exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al guardar la reserva. Inténtalo nuevamente.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Método no permitido.</div>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #4CAF50;
            margin-top: 20px;
        }
        form {
            display: inline-block;
            text-align: left;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 8px;
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, textarea, button {
            width: 100%;
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Reservar</h1>
    <form action="reservacion.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required>
        
        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="3" required></textarea>
        
        <button type="submit">Reservar</button>
    </form>
</body>
</html>