<?php
require_once(dirname(__FILE__) . "\Calculo.php");


/**
 * Class consultas
 */
class Consulta {

    private $metodo = "";
    public function __construct($metodo) {
        $this->metodo = $metodo;
    }

    public function Ejecutar(){
        switch ($this->metodo) {
            case 'GET':
                $calc = new Calculo();
                switch ($_GET["action"]) {
                    case 'factorial':
                        // Si no existe numero o no es numerico
                        if(!isset($_GET["numero"]) || !is_numeric($_GET["numero"])){
                            return json_encode(["status" => "error", "msg" => "NUMERO INVÁLIDO"], JSON_PRETTY_PRINT);
                        }
                        
                        $resultado = $calc->calcularFactorialObjeto(intval($_GET["numero"]));
                        return json_encode(["status" => "OK", "msg" => "", "resultado" => $resultado], JSON_PRETTY_PRINT);
                        break;
                    
                    default:
                        return json_encode(["status" => "error", "msg" => "OPERACION NO PERMITIDA"], JSON_PRETTY_PRINT);
                        break;
                }
                break;			
            default:
                return json_encode(["status" => "error", "msg" => "METODO NO PERMITIDO"], JSON_PRETTY_PRINT);
                break;
        }
    }
}