<?php
include "libreria.php";
$estilo = new Encabezado();
$estilo->mostrar("");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Noticias desde WordPress 📰</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .noticia {
            background-color: #fff;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 10px;
        }
        .noticia h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <h1>Noticias desde WordPress 📰</h1>
    <form method="post" action="tema6.php">
        <label>Selecciona una fuente:</label>
        <select name="fuente">
            <option value="https://wordpress.com/blog/wp-json/wp/v2/posts">WordPress.com Blog</option>
            <option value="https://wptavern.com/wp-json/wp/v2/posts">WPTavern</option>
        </select>
        <button type="submit">Cargar Noticias</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fuente = $_POST['fuente'] ?? '';
        $json = file_get_contents($fuente . "?per_page=3");

        if ($json !== false) {
            $noticias = json_decode($json);

            echo "<h2>Últimas noticias:</h2>";
            foreach ($noticias as $post) {
                $titulo = $post->title->rendered;
                $resumen = strip_tags($post->excerpt->rendered);
                $link = $post->link;

                echo "<div class='noticia'>";
                echo "<h2>$titulo</h2>";
                echo "<p>$resumen</p>";
                echo "<p><a href='$link' target='_blank'>Leer más</a></p>";
                echo "</div>";
            }
        } else {
            echo "<p style='color:red;'>❌ Error al obtener noticias.</p>";
        }
    }
    ?>
</body>
</html>

<?php
$estilo->cerrar();
?>
