<?php
include "libreria.php";
$estilo = new Encabezado();
$estilo->mostrar("");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clima en República Dominicana 🌦️</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            padding: 20px;
        }
        .sol {
            background-color: #ffe066;
        }
        .lluvia {
            background-color: #a3d5ff;
        }
        .nublado {
            background-color: #d3d3d3;
        }
    </style>
</head>
<body>
    <h1>Clima en República Dominicana 🌦️</h1>
    <form method="post" action="tema4.php">
        <input type="text" name="ciudad" placeholder="Escribe una ciudad">
        <button type="submit">Buscar</button>
    </form>

    <?php
    $ciudad = $_POST['ciudad'] ?? 'Santo Domingo';
    $url = "https://wttr.in/" . urlencode($ciudad) . "?format=j1";

    $json = file_get_contents($url);
    if ($json !== false) {
        $data = json_decode($json, true);
        if (isset($data['current_condition'][0])) {
            $condicion = $data['current_condition'][0]['weatherDesc'][0]['value'];
            $tempC = $data['current_condition'][0]['temp_C'];

            // Determinar icono y clase según condición
            $cond = strtolower($condicion);
            if (str_contains($cond, 'sun')) {
                $icono = "☀️";
                $clase = "sol";
            } elseif (str_contains($cond, 'rain')) {
                $icono = "🌧️";
                $clase = "lluvia";
            } elseif (str_contains($cond, 'cloud')) {
                $icono = "☁️";
                $clase = "nublado";
            } else {
                $icono = "🌡️";
                $clase = "";
            }

            echo "<div class='$clase' style='margin-top:20px;padding:20px;border-radius:10px;'>";
            echo "<h2>$icono Clima en $ciudad</h2>";
            echo "<p><strong>Condición:</strong> $condicion</p>";
            echo "<p><strong>Temperatura:</strong> $tempC °C</p>";
            echo "</div>";
        } else {
            echo "<p style='color:red;'>❌ No se encontró el clima de esa ciudad.</p>";
        }
    } else {
        echo "<p style='color:red;'>⚠️ No se pudo conectar a la API de clima.</p>";
    }
    ?>
</body>
</html>

<?php
$estilo->cerrar();
?>