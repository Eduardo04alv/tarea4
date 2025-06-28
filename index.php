<?php
include "libreria.php";
$estilo = new Encabezado();
$estilo->mostrar("Bienvenido al Portal de Eduardo Guzmán");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio - Portal de Eduardo Guzmán</title>
    <style>
        .perfil {
            margin-top: 30px;
        }
        .perfil img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid #555;
        }
        .perfil h2 {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="perfil">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZtWBVfAYfadoSkWDVFTm_TdTD-8me4oTwog&s" alt="Foto de Eduardo Guzmán">
        <h2>Eduardo Guzmán</h2>
        <p>Bienvenido a mi portal web interactivo 💻. Aquí puedes explorar diferentes aplicaciones conectadas a APIs públicas.</p>
    </div>
</body>
</html>

<?php
$estilo->cerrar();
?>
