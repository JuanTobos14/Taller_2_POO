<?php
class Estadisticas {
    private $numeros;

    public function __construct($numeros) {
        $this->numeros = $numeros;
        sort($this->numeros);
    }

    public function promedio() {
        return array_sum($this->numeros) / count($this->numeros);
    }

    public function mediana() {
        $n = count($this->numeros);
        if ($n % 2 == 0) {
            $mediana = ($this->numeros[$n / 2 - 1] + $this->numeros[$n / 2]) / 2;
        } else {
            $mediana = $this->numeros[floor($n / 2)];
        }
        return $mediana;
    }

    public function moda() {
        $valores = array_count_values($this->numeros);
        $max = max($valores);
        $moda = [];
        foreach ($valores as $num => $cantidad) {
            if ($cantidad == $max) {
                $moda[] = $num;
            }
        }
        return $moda;
    }
}

$resultado = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entrada = $_POST['numeros'];
    $numeros = array_map('intval', explode(',', $entrada));
    $estadistica = new Estadisticas($numeros);

    $resultado = "<p>Promedio: " . $estadistica->promedio() . "</p>";
    $resultado .= "<p>Mediana: " . $estadistica->mediana() . "</p>";
    $resultado .= "<p>Moda: " . implode(", ", $estadistica->moda()) . "</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado de la Estadística</h1>
    <?php echo $resultado; ?>
    <br><a href="3.html">Volver</a>
</body>
</html>