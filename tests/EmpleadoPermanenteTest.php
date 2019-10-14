<?php
require_once "FuncionesBasicasTest.php";
class EmpleadoEventualTest extends FuncionesBasicasTest {

    public function crear(
        $salario = 10000,
        $nombre = "Fulano",
        $apellido = "De Tal", 
        $dni = 11111111,
        $fechaIngreso = null
    ) {
        $ca = new \App\EmpleadoEventual(
            $nombre,
            $apellido,
            $dni,
            $salario,
            $fechaIngreso
        );
        return $ca;
    }
    public function testGetFechaIngresoFuncionaCorrectamente(){

    }