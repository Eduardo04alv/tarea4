<?php
include "libreria.php";
$estilo = new Encabezado();
$estilo->mostrar("");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Información de un Pokémon ⚡</title>
    <style>
        body {
            font-family: 'Verdana';
            background-color: #f0f8ff;
            text-align: center;
            padding: 20px;
        }
        .pokemon-card {
            background-color: #ffcc00;
            border: 4px solid #3b4cca;
            border-radius: 15px;
            display: inline-block;
            padding: 20px;
            margin-top: 20px;
            width: 350px;
            box-shadow: 0 0 15px #888;
        }
        .pokemon-card h2 {
            margin-top: 0;
        }
        .audio-box {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Información de un Pokémon ⚡</h1>
    <form method="post" action="tema5.php">
        <input type="text" name="pokemon" placeholder="Escribe el nombre del Pokémon">
        <button type="submit">Buscar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pokemon = strtolower(trim($_POST['pokemon'] ?? ''));
        $url = "https://pokeapi.co/api/v2/pokemon/" . urlencode($pokemon);
        $json = file_get_contents($url);

        if ($json !== false) {
            $data = json_decode($json);

            $nombre = ucfirst($data->name);
            $imagen = $data->sprites->other-> { 'official-artwork'}->front_default ?? $data->sprites->front_default;
            $experiencia = $data->base_experience;
            $habilidades = array_map(function($h) {
                return $h->ability->name;
            }, $data->abilities);

            echo "<div class='pokemon-card'>";
            echo "<h2>$nombre</h2>";
            echo "<img src='$imagen' alt='$nombre' width='150'>";
            echo "<p><strong>Experiencia base:</strong> $experiencia</p>";
            echo "<p><strong>Habilidades:</strong> " . implode(', ', $habilidades) . "</p>";

            // Reproducir sonido si se tiene (usamos un sitio externo no oficial)
            $audioURL = "https://play.pokemonshowdown.com/audio/cries/$pokemon.mp3";
            echo "<div class='audio-box'><audio controls><source src='$audioURL' type='audio/mpeg'>Tu navegador no soporta audio.</audio></div>";
            echo "</div>";
        } else {
            echo "<p style='color:red;'>❌ No se encontró ese Pokémon.</p>";
        }
    }
    ?>
</body>
</html>

<?php
$estilo->cerrar();
?>
