<?php 
include "libreria.php";
$estilo = new Encabezado();
$estilo->mostrar("");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Predicción de género</title>
</head>
<body>
    <h1>🔍 Predicción de género 👦👧</h1>
    <form method="post" action="tema1.php">
        <input type="text" name="nombre" placeholder="Escribe un nombre">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <?php
    $gender = null;
    $probability = null;
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'] ?? '';
        $ruta = "https://api.genderize.io/?name=" . urlencode($nombre);
        $json = file_get_contents($ruta);

        if ($json !== false) {
            $data = json_decode($json);

            if (isset($data->gender)) {
                $gender = $data->gender;
                $probability = $data->probability;
            } else {
                $error = "❌ Nombre no reconocido por la API.";
            }
        } else {
            $error = "⚠️ Error al conectar con la API.";
        }
    }
    if ($gender) {
        if($gender == "female"){
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Género:</strong> $gender ❤️❤️</p>";
        echo "<p><strong>Probabilidad:</strong> $probability</p>";
        }elseif($gender == "male"){
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Género:</strong> $gender 💙 💙 </p>";
        echo "<p><strong>Probabilidad:</strong> $probability</p>";  
        }
    } elseif ($error) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
</body>
</html>

<?php
$estilo->cerrar();
?>