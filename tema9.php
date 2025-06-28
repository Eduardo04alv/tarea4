<?php
include "libreria.php";
$estilo = new Encabezado();
$estilo->mostrar("");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Datos de un país 🌍</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            padding: 20px;
            background-color: #eef2f3;
        }
        .pais {
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 10px;
            display: inline-block;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px #bbb;
        }
        img {
            max-width: 150px;
            border: 1px solid #000;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Datos de un país 🌍</h1>
    <form method="post" action="tema9.php">
        <input type="text" name="pais" placeholder="Escribe un país">
        <button type="submit">Buscar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pais = trim($_POST['pais'] ?? '');
        if ($pais) {
            $url = "https://restcountries.com/v3.1/name/" . urlencode($pais);
            $json = file_get_contents($url);

            if ($json !== false) {
                $datos = json_decode($json, true);

                if (!empty($datos) && isset($datos[0])) {
                    $info = $datos[0];
                    $nombre = $info['name']['common'] ?? 'Desconocido';
                    $bandera = $info['flags']['png'] ?? '';
                    $capital = $info['capital'][0] ?? 'No disponible';
                    $poblacion = number_format($info['population'] ?? 0);
                    $monedaInfo = reset($info['currencies']);
                    $moneda = $monedaInfo['name'] ?? 'No disponible';
                    $simbolo = $monedaInfo['symbol'] ?? '';

                    echo "<div class='pais'>";
                    echo "<img src='$bandera' alt='Bandera de $nombre'>";
                    echo "<h2>$nombre</h2>";
                    echo "<p>🏛️ <strong>Capital:</strong> $capital</p>";
                    echo "<p>👥 <strong>Población:</strong> $poblacion</p>";
                    echo "<p>💰 <strong>Moneda:</strong> $moneda ($simbolo)</p>";
                    echo "</div>";
                } else {
                    echo "<p style='color:red;'>❌ País no encontrado.</p>";
                }
            } else {
                echo "<p style='color:red;'>⚠️ Error al conectar con la API.</p>";
            }
        } else {
            echo "<p style='color:red;'>Por favor escribe un país válido.</p>";
        }
    }
    ?>
</body>
</html>

<?php
$estilo->cerrar();
?>
