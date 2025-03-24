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
</head>
<body>
    <div>
        <?php
        echo $nombre->toString().'<br>';
        ?>
    </div>
</body>
</html>