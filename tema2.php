<?php 
include "libreria.php";
$estilo = new Encabezado();
$estilo->mostrar("");
?>
<!DOCTYPE html>
<html>
<head>
    <title>🔍 Predicción de edad  🎂</title>
</head>
<body>
    <h1>🔍 Predicción de edad  🎂</h1>
    <form method="post" action="tema2.php">
        <input type="text" name="nombre" placeholder="Escribe un nombre">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <?php
    $ege = null;
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'] ?? '';
        $ruta = "https://api.agify.io/?name=" . urlencode($nombre);
        $json = file_get_contents($ruta);

        if ($json !== false) {
            $data = json_decode($json);

            if (isset($data->age)) {
                $age = $data->age;
                
            } else {
                $error = "❌ Nombre no reconocido por la API.";
            }
        } else {
            $error = "⚠️ Error al conectar con la API.";
        }
    }
    if ($age){
        
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>edad:</strong> $age </p>";
        if($age <= 18){
            echo"<p>es menor de edad </p>";
            echo "<img src='https://img.freepik.com/foto-gratis/ninos-sonrientes-tiro-medio-posando-juntos_23-2149073581.jpg?semt=ais_hybrid&w=740' alt='jovenes' width='300' height='200'>";
        }elseif($age <= 60){
            echo"<p> es adulto </p>";
            echo "<img src='https://psicologarosamarrivas.com/wp-content/uploads/2016/08/grupo-adultos.jpg' alt='jovenes' width='300' height='200'>";
        }else{
           echo"<p>es una persona mayor </p>"; 
           echo "<img src='https://i0.wp.com/plenaidentidad.com/wp-content/uploads/2018/06/Entorno-Plena-identidad.jpg?resize=670%2C400' alt='jovenes' width='300' height='200'>";
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