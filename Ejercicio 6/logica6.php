<?php
include 'respuesta6.php';

$arbol = new Distincion($_POST['pre'], $_POST['ino'], $_POST['pos']); 
$arbol->set('preorden', $_POST['pre']);
$arbol->set('inorden', $_POST['ino']);
$arbol->set('postorden', $_POST['pos']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>6. Árbol</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <main>
        <h1>Árbol Binario</h1>
        <a href="../Ejercicio 6/6.html">Volver</a>
        <div>
            <?php 
            $arbol->toString();
            ?>
        </div>
    </main>
</body>
</html>
