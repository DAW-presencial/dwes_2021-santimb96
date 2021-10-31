<?php

/**
 * @Retorno esta clase tiene tres atributos privados
 * que devolveran los valroes mediante los metodos magicos
 * __set() y __get()
 */
class Retorno
{
    /**
     * @var mixed las variables no contienen control especifico
     * de tipos
     */
    private $a;
    private $b;
    private $c;

    /**
     * @param $name mixed por defecto del set
     * @param $value mixed calor que le pasemos
     */

    public function __set($name, $value)
    {
        /**
         * asignacion de los valores a b y c desde un array
         */
        $this->b = $value[0];
        $this->c = $value[1];
    }

    /**
     * @param $property mixed por defecto del get
     * @return string devuelve en string los valores asignados previamente
     */
    public function __get($property)
    {
        return $this->b . ", " . $this->c;
    }
}