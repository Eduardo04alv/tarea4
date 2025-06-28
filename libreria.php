<?php
class Encabezado {

    public function mostrar($titulo = "Mi Página") {
        ?>
        
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title><?php echo $titulo; ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <style>
             body {
            font-family: Arial;
            text-align: center;
            padding: 20px;
        }
        </style>   
        <body>
            <div class="container mt-3">
                <div class="mb-3">
                    <h1><?php echo $titulo; ?></h1>
                    <div>
                        <a href="tema1.php" class="btn btn-primary">Género 👦👧</a>
                        <a href="tema2.php" class="btn btn-success">Edad 🎂</a>
                        <a href="tema3.php" class="btn btn-warning">Universidades 🎓</a>
                        <a href="tema4.php" class="btn btn-info">Clima 🌦️</a>
                        <a href="tema5.php" class="btn btn-danger">Pokémon ⚡</a>
                        <a href="tema6.php" class="btn btn-dark">WordPress 📰</a>
                        <a href="tema7.php" class="btn btn-secondary">Monedas 💰</a>
                        <a href="tema8.php" class="btn btn-light border">Imágenes IA 🖼️</a>
                        <a href="tema9.php" class="btn btn-outline-success">Datos País 🌍</a>
                        <a href="tema10.php" class="btn btn-outline-danger">Chiste 🤣</a>
                        <a href="index.php" class="btn btn-outline-primary">Inicio 🏠</a>
                    </div>
                </div>
        <?php
    }

    public function cerrar() {
        echo '</div></body></html>';
    }

}
?>
