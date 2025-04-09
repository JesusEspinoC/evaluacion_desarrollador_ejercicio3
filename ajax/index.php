<?php
require_once("../modelo/Consulta.php");

header('Content-Type: application/json; charset=UTF-8');

$consulta = new Consulta($_SERVER['REQUEST_METHOD']);
echo $consulta->Ejecutar();
?>