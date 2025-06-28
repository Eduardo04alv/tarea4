<?php 
include "libreria.php";
$estilo = new Encabezado();
$estilo->mostrar("");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Universidades de un país 🎓</title>
</head>
<body>
    <h1>Universidades de un país 🎓</h1>
    <form method="post" action="tema3.php">
        <input type="text" name="pais" placeholder="Escribe un país">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <?php
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pais = $_POST['pais'] ?? '';
        $ruta = "http://universities.hipolabs.com/search?country=" . urlencode($pais);
        $json = file_get_contents($ruta);

        if ($json !== false) {
            $data = json_decode($json);

            if (!empty($data)) {
                echo "<table border='2' cellpadding='5'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Código del país</th>";
                echo "<th>Página web</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($data as $uni) {
                    $nombre = $uni->name;
                    $codigo = $uni->alpha_two_code;
                    $web = $uni->web_pages[0] ?? 'No disponible';

                    echo "<tr>";
                    echo "<td>$nombre</td>";
                    echo "<td>$codigo</td>";
                    echo "<td><a href='$web' target='_blank'>$web</a></td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p style='color:red;'>❌ No se encontraron universidades para ese país.</p>";
            }
        } else {
            echo "<p style='color:red;'>⚠️ Error al conectar con la API.</p>";
        }
    }
    ?>
</body>
</html>

<?php
$estilo->cerrar();
?>
