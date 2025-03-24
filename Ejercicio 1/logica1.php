<?php
include 'respuesta1.php';

$nombre = new Acronimo($_POST['nombre']);
$nombre->set('nombre', $_POST['nombre']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>1. Acronimos</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <main>
    <h1>Generador de Acronimos</h1>
    <a href="../Ejercicio 1/1.html">Volver</a>
    <div>
        <p>El acrónimo de "<?php echo $nombre->nombre; ?>" es: </p>
        <?php echo strtoupper($nombre->toString()); ?>
    </div>
    </main>
</body>
</html>