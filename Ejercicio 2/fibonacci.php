<?php
class Calculadora {
    private $numero;

    public function __construct($numero) {
        $this->numero = $numero;
    }

    public function fibonacci() {
        $fibo = [0, 1];
        for ($i = 2; $i < $this->numero; $i++) {
            $fibo[$i] = $fibo[$i - 1] + $fibo[$i - 2];
        }
        return $fibo;
    }

    public function factorial() {
        $fact = 1;
        for ($i = 1; $i <= $this->numero; $i++) {
            $fact *= $i;
        }
        return $fact;
    }
}

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];
    $operacion = $_POST['operacion'];

    $calc = new Calculadora($numero);

    if ($operacion === 'fibonacci') {
        $resultado = "Serie Fibonacci: " . implode(", ", $calc->fibonacci());
    } elseif ($operacion === 'factorial') {
        $resultado = "El factorial de $numero es: " . $calc->factorial();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado</h1>
    <p><?php echo $resultado; ?></p>
    <a href="2.html">Volver</a>
</body>
</html>
