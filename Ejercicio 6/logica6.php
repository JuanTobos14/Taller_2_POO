<?php

interface Model{
    function get($prop);
    function set($prop, $value);
}

class Arbol implements Model{
    protected $preorden = null;
    protected $inorden = null;
    protected $postorder = null;

    function get($prop){
        return $this->{$prop};
    }

    function set($prop, $value){
        $this->{$prop} = $value;
    }
}

class Preorden extends Arbol{
    function toString(){
        $preorden = $this->preorden;
        for ($i=0; $i<strlen($preorden); $i++){
            
        }
    }
}