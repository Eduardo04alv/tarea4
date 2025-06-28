<?php
include "libreria.php";
$estilo = new Encabezado();
$estilo->mostrar("");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Conversión de Monedas 💰</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .resultado {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            display: inline-block;
            padding: 20px;
            margin-top: 20px;
        }
        .moneda {
            font-size: 1.2em;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Conversión de Monedas 💰</h1>
    <form method="post" action="tema7.php">
        <input type="number" name="usd" step="0.01" placeholder="Cantidad en USD">
        <button type="submit">Convertir</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cantidad = floatval($_POST['usd'] ?? 0);

        $url = "https://api.exchangerate-api.com/v4/latest/USD";
        $json = file_get_contents($url);

        if ($json !== false) {
            $data = json_decode($json, true);

            if (isset($data['rates']['DOP'])) {
                $tasaDOP = $data['rates']['DOP'];
                $tasaEUR = $data['rates']['EUR'];
                $tasaMXN = $data['rates']['MXN'];
                $tasaJPY = $data['rates']['JPY'];

                $valorDOP = $cantidad * $tasaDOP;
                $valorEUR = $cantidad * $tasaEUR;
                $valorMXN = $cantidad * $tasaMXN;
                $valorJPY = $cantidad * $tasaJPY;

                echo "<div class='resultado'>";
                echo "<h2>💵 $cantidad USD equivale a:</h2>";
                echo "<div class='moneda'>🇩🇴 $valorDOP DOP</div>";
                echo "<div class='moneda'>🇪🇺 $valorEUR EUR</div>";
                echo "<div class='moneda'>🇲🇽 $valorMXN MXN</div>";
                echo "<div class='moneda'>🇯🇵 $valorJPY JPY</div>";
                echo "</div>";
            } else {
                echo "<p style='color:red;'>No se pudieron obtener los tipos de cambio.</p>";
            }
        } else {
            echo "<p style='color:red;'>Error al conectar con la API.</p>";
        }
    }
    ?>
</body>
</html>

<?php
$estilo->cerrar();
?>