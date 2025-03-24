<?php

interface Modelo{
    function get($prop);
    function set($prop, $value);
}

class Nombre implements Modelo{
    public $nombre=null;

    function get($prop){
        return $this->{$prop};
    }

    function set($prop, $value){
        $this->{$prop} = $value;
    }
}

class Acronimo extends Nombre{
    function toString(){
        $nombre=$this->nombre;
        $acronimo=preg_split("/[\+\-\*\ ]/", $nombre);
        $nombre=null;
        foreach ($acronimo as $acronimo) {
            $nombre.=$acronimo[0];
        }
        return "$nombre";
    }
}
    