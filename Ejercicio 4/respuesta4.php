<?php
class Conjuntos {
    private $A;
    private $B;

    public function __construct($A, $B) {
        $this->A = array_unique(array_map('intval', explode(',', str_replace(' ', '', $A))));
        $this->B = array_unique(array_map('intval', explode(',', str_replace(' ', '', $B))));
    }

    public function union() {
        return array_unique(array_merge($this->A, $this->B));
    }

    public function interseccion() {
        return array_values(array_intersect($this->A, $this->B));
    }

    public function diferenciaAB() {
        return array_values(array_diff($this->A, $this->B));
    }

    public function diferenciaBA() {
        return array_values(array_diff($this->B, $this->A));
    }
}

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conjuntoA = $_POST['conjuntoA'];
    $conjuntoB = $_POST['conjuntoB'];

    $conjuntos = new Conjuntos($conjuntoA, $conjuntoB);

    $resultado .= "<p><strong>Unión:</strong> " . implode(", ", $conjuntos->union()) . "</p>";
    $resultado .= "<p><strong>Intersección:</strong> " . implode(", ", $conjuntos->interseccion()) . "</p>";
    $resultado .= "<p><strong>Diferencia A - B:</strong> " . implode(", ", $conjuntos->diferenciaAB()) . "</p>";
    $resultado .= "<p><strong>Diferencia B - A:</strong> " . implode(", ", $conjuntos->diferenciaBA()) . "</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado de las Operaciones con Conjuntos</h1>
    <?php echo $resultado; ?>
    <br><a href="4.html">Volver</a>
</body>
</html>
