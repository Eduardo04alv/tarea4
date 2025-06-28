<?php
include "libreria.php";
$estilo = new Encabezado();
$estilo->mostrar("");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generador de imágenes IA 🖼️</title>
    <style>
        body { font-family: Arial; text-align: center; padding: 20px; background-color: #f5f5f5; }
        img { margin-top: 20px; border: 4px solid #333; border-radius: 12px; max-width: 90%; }
    </style>
</head>
<body>
    <h1>Generador de Imágenes con IA 🖼️</h1>
    <form method="post" action="">
        <input type="text" name="palabra" placeholder="Escribe una palabra clave">
        <button type="submit">Buscar Imagen</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $palabra = trim($_POST['palabra'] ?? '');

        if ($palabra) {
            // Usamos loremflickr con la palabra clave, tamaño 600x400
            $urlImagen = "https://loremflickr.com/600/400/" . urlencode($palabra);

            echo "<h2>Resultado para: <em>$palabra</em></h2>";
            echo "<img src='$urlImagen' alt='Imagen de $palabra'>";
        } else {
            echo "<p style='color:red;'>❌ Escribe una palabra clave válida.</p>";
        }
    }
    ?>
</body>
</html>

<?php
$estilo->cerrar();
?>
