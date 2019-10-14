<?php
require_once "FuncionesBasicasTest.php";
class EmpleadoEventualTest extends FuncionesBasicasTest {

    public function crear(
        $salario = 10000,
        Array $montos = [],
        $nombre = "Fulano",
        $apellido = "De Tal", 
        $dni = 11111111
    ) {
        $ca = new \App\EmpleadoEventual(
            $nombre,
            $apellido,
            $dni,
            $salario,
            $montos
        );
        return $ca;
    }
    