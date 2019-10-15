<?php
require_once "FuncionesBasicasTest.php";
require_once "utils.php";

class EmpleadoPermanenteTest extends FuncionesBasicasTest {

    public function crear(
        // Parms del method crear
        $fechaIngreso=null,
        $salario=SALARIO,
        $nombre=NOMBRE,
        $apellido=APELLIDO,
        $dni=DNI
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

    public function testExceptionFechaFutura() {
        // Test excepción en caso de ser una fecha futura
        $this->expectException(\Exception::class);
        $fechaActual = new \DateTime();
        $unaFechaFutura = $fechaActual->add(new DateInterval('P10D'));

        $ca = $this->crear($fechaIngreso=$unaFechaFutura);
    }

    public function testCalcularAntiguedad() {
        // Test resultado de varios años de experiencia
        $fechaIngreso = new \DateTime("- 2 years");
        $fechaActual = new \DateTime();
        $antiguedad = $fechaIngreso->diff($fechaActual);

        $ca = $this->crear($fechaIngreso=$fechaIngreso);
        $this->assertEquals($ca->calcularAntiguedad(), $antiguedad->y);
    }
    public function testCalcularComision() {
        $fechaIngreso = new \DateTime("- 2 years");
        $fechaActual = new \DateTime();
        $antiguedad = $fechaIngreso->diff($fechaActual);
        $ca = $this->crear($fechaIngreso=$fechaIngreso);
        $comisionFinal = $fechaIngreso . "%";
        $this->assertEquals($comisionFinal,$ca->calcularComision());
    }
    public function testCalcularIngresoTotalFuncionaCorrectamente() {
        $fechaIngreso = new \DateTime("- 2 years");
        $fechaActual = new \DateTime();
        $antiguedad = $fechaIngreso->diff($fechaActual);
        $ingresoTotal = SALARIO + ((SALARIO * $antiguedad->format("%y") )/ 100); 
        $ca = $this->crear($fechaIngreso=$fechaIngreso);
        $this->assertEquals($ingresoTotal,$ca->calcularIngresoTotal());

    }

}
