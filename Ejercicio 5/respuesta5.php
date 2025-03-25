<?php

interface Modelo{
    function get($prop);
    function set($prop, $value);
}

class Numero implements Modelo{
    public $entero=null;

    function get($prop){ 
        return $this->{$prop};
    }

    function set($prop, $value){
        $this->{$prop} = $value;
    }
}

class Binario extends Numero{
    function toString(){
        $entero = $this->entero;
        $binario=null;
        while ($entero != 0) {
            $res=floor($entero/2);
            $binario.=$entero%2;
            $entero=$res;
        }
        $entero = $binario;
        return strrev($entero);
    }
}
    