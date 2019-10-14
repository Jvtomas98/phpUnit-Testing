<?php
require_once "FuncionesBasicasTest.php";
require_once "utils.php";

class EmpleadoPermanenteTest extends FuncionesBasicasTest {

    public function crear(
        // Parms del method crear
        $salario=SALARIO,
        $nombre=NOMBRE,
        $apellido=APELLIDO,
        $dni=DNI,
        $fechaIngreso=null
    ) {
        $ca = new \App\EmpleadoPermanente(
            $nombre,
            $apellido,
            $dni,
            $salario,
            $fechaIngreso
        );
        return $ca;
    }

    public function testGetFechaIngresoFuncionaCorrectamente(){
        // Test si getFechaIngreso es un objeto DateTime
        $ca = $this->crear();
        $this->assertEquals(is_a($ca->getFechaIngreso(), 'DateTime'), true);
    }

}
