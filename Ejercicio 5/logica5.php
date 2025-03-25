<?php
include 'respuesta5.php';

$entero = new Binario($_POST['entero']); 
$entero->set('entero', $_POST['entero']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>5. Binarios</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <main>
    <h1>Convertidor Binario</h1>
    <a href="../Ejercicio 5/5.html">Volver</a>
    <div>
        <p>El binario de "<?php echo $entero->entero; ?>" es: </p>
        <?php echo strtoupper($entero->toString()); ?>
    </div>
    </main>
</body>
</html>