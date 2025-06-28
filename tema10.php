<?php
include "libreria.php";
$estilo = new Encabezado();
$estilo->mostrar("");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generador de chistes 🤣</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive;
            background-color: #fff8dc;
            text-align: center;
            padding: 40px;
        }
        .chiste {
            background-color: #ffef9f;
            border: 3px dashed #ffa500;
            border-radius: 15px;
            padding: 25px;
            display: inline-block;
            max-width: 600px;
            margin-top: 30px;
            box-shadow: 5px 5px 10px rgba(0,0,0,0.2);
        }
        h1 {
            font-size: 2.5em;
            color: #ff6600;
        }
        p {
            font-size: 1.3em;
        }
    </style>
</head>
<body>
    <h1>Generador de Chistes 🤣</h1>

    <?php
    $url = "https://official-joke-api.appspot.com/random_joke";
    $json = file_get_contents($url);

    if ($json !== false) {
        $data = json_decode($json, true);
        $pregunta = $data['setup'] ?? "No se pudo cargar el chiste.";
        $respuesta = $data['punchline'] ?? "";

        echo "<div class='chiste'>";
        echo "<p><strong>$pregunta</strong></p>";
        echo "<p>😆 $respuesta</p>";
        echo "</div>";
    } else {
        echo "<p style='color:red;'>❌ Error al obtener el chiste.</p>";
    }
    ?>
</body>
</html>

<?php
$estilo->cerrar();
?>
