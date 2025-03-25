<?php

interface Model {
    function get($prop);
    function set($prop, $value);
}

class Arbol implements Model {
    protected $preorden = null;
    protected $inorden = null;
    protected $postorden = null;

    function get($prop) { 
        return $this->{$prop};
    }

    function set($prop, $value) {
        $this->{$prop} = $value;
    }
}

class Distincion extends Arbol {
    private function construirArbol($preorden, $inorden) {
        if (empty($preorden) || empty($inorden)) {
            return null;
        }

        $raiz = array_shift($preorden);
        $indexRaizInorden = array_search($raiz, $inorden);

        if ($indexRaizInorden === false) {
            echo "Error: No se encontró la raíz en el inorden.\n";
            return null;
        }

        $izquierdaInorden = array_slice($inorden, 0, $indexRaizInorden);
        $derechaInorden = array_slice($inorden, $indexRaizInorden + 1);

        $izquierdaPreorden = array_filter($preorden, function($item) use ($izquierdaInorden) {
            return in_array($item, $izquierdaInorden);
        });

        $derechaPreorden = array_filter($preorden, function($item) use ($derechaInorden) {
            return in_array($item, $derechaInorden);
        });

        $nodo = new stdClass();
        $nodo->valor = $raiz;
        $nodo->izquierda = $this->construirArbol($izquierdaPreorden, $izquierdaInorden);
        $nodo->derecha = $this->construirArbol($derechaPreorden, $derechaInorden);

        return $nodo;
    }

    private function construirArbolPost($postorden, $inorden) {
        if (empty($postorden) || empty($inorden)) {
            return null;
        }

        $raiz = array_pop($postorden);
        $indexRaizInorden = array_search($raiz, $inorden);

        if ($indexRaizInorden === false) {
            echo "Error: No se encontró la raíz en el inorden.\n";
            return null;
        }

        $izquierdaInorden = array_slice($inorden, 0, $indexRaizInorden);
        $derechaInorden = array_slice($inorden, $indexRaizInorden + 1);

        $izquierdaPostorden = array_filter($postorden, function($item) use ($izquierdaInorden) {
            return in_array($item, $izquierdaInorden);
        });

        $derechaPostorden = array_filter($postorden, function($item) use ($derechaInorden) {
            return in_array($item, $derechaInorden);
        });

        $nodo = new stdClass();
        $nodo->valor = $raiz;
        $nodo->izquierda = $this->construirArbolPost($izquierdaPostorden, $izquierdaInorden);
        $nodo->derecha = $this->construirArbolPost($derechaPostorden, $derechaInorden);

        return $nodo;
    }

    private function construirArbolPrePost($preorden, $postorden) {
        if (empty($preorden) || empty($postorden)) {
            return null;
        }

        $raiz = array_shift($preorden); 
        $lastElement = end($postorden);

        if ($raiz !== $lastElement) {
            echo "Error: Las secuencias no corresponden entre Preorden y Postorden.\n";
            return null;
        }

        array_pop($postorden);

        $izquierdaPreorden = array_filter($preorden, function($item) use ($postorden) {
            return in_array($item, $postorden);
        });

        $derechaPreorden = array_diff($preorden, $izquierdaPreorden);

        $nodo = new stdClass();
        $nodo->valor = $raiz;
        $nodo->izquierda = $this->construirArbolPrePost($izquierdaPreorden, $postorden);
        $nodo->derecha = $this->construirArbolPrePost($derechaPreorden, $postorden);

        return $nodo;
    }

    private function imprimirArbol($nodo, $nivel = 0) {
        if ($nodo === null) {
            return;
        }

        echo str_repeat("  ", $nivel) . $nodo->valor . "\n";
        
        $this->imprimirArbol($nodo->izquierda, $nivel + 1);
        $this->imprimirArbol($nodo->derecha, $nivel + 1);
    }

    function toString() {
        if (empty($this->preorden) && empty($this->inorden) && empty($this->postorden)) {
            echo "Error: Se deben proporcionar al menos dos secuencias.\n";
            return;
        }

        $preorden = preg_split("/[\+\-\*\ ]/", $this->preorden);
        $inorden = preg_split("/[\+\-\*\ ]/", $this->inorden);
        $postorden = preg_split("/[\+\-\*\ ]/", $this->postorden);

        if (!empty($this->preorden) && !empty($this->inorden)) {
            $arbol = $this->construirArbol($preorden, $inorden);
        } elseif (!empty($this->inorden) && !empty($this->postorden)) {
            $arbol = $this->construirArbolPost($postorden, $inorden);
        } elseif (!empty($this->preorden) && !empty($this->postorden)) {
            $arbol = $this->construirArbolPrePost($preorden, $postorden);
        } else {
            echo "Error: No se pudo formar el árbol con las secuencias proporcionadas.\n";
            return;
        }

        echo "Árbol Binario (visualización jerárquica):\n";
        $this->imprimirArbol($arbol);
    }
}

?>
