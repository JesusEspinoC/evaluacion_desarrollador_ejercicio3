<?php
/**
 * Class Calculo
 */

 class Calculo{
    public function __construct() {
    }

    // funcion inicial para calculo, no incluye procedimiento
    public function calcularFactorial($num){
        if($num <= 1){
            return 1;
        }
        else {
            return $num * $num - 1;
        }
    }

    // para incluir procedimiento, variable pasa a ser objeto
    public function calcularFactorialObjeto($obj, $proxNum = null, $cont = 1){

        // Ajuste para ingresar un numero en lugar objeto como primer parametro
        if(is_numeric($obj)){
            $temp = new stdClass();
            $temp->numero = $obj;
            $temp->numeroOriginal = $obj;
            $temp->resultado = null;
            $temp->procedimiento = "";
            $obj = $temp;
        }
        // Ajuste para evitar requerer 2do parametro al llamar a funcion
        if($proxNum === null){
            $proxNum = $obj->numero - 1;
        }

        if($obj->numero <= 1){
            $obj->procedimiento .= "x 1";

            // por regla de permutaciones, 0! = 1
            if($obj->resultado == null && $obj->numeroOriginal == 0){
                $obj->procedimiento = "1";
                $obj->resultado = 1;
            }
            // por regla de permutaciones, 1! = 1 * 0! = 1
            if($obj->resultado == null && $obj->numeroOriginal == 1){
                $obj->procedimiento = "1 x 1";
                $obj->resultado = 1;
            }

            return $obj;
        }
        else {
            // Añadir "x " si no es la primer iteracion de funcion recursiva
            if($cont > 1){
                $obj->procedimiento .= "x ";
                $obj->resultado = $obj->resultado * $proxNum;
            } else{
                $obj->resultado = $obj->numero * $proxNum;
            }
            $obj->procedimiento .= $obj->numero." ";
            $obj->numero--;
            
            return $this->calcularFactorialObjeto($obj, $obj->numero - 1, $cont+1);
        }
    }
 }