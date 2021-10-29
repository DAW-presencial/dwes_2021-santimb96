<?php

class Retorno
{
private $a;
private $b;
private $c;

public function __set($name, $value){
    $this->b = $value[0];
    $this->c = $value[1];
}
public function __get($property){
    return $this->b. ", ".$this->c;
}
}