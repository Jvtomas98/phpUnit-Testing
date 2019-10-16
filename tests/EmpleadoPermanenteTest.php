<?php
require_once "FuncionesBasicasTest.php";
require_once "utils.php";

class EmpleadoPermanenteTest extends FuncionesBasicasTest {

    public function crear(
        // Parms del method crear
        $nombre=NOMBRE,
        $apellido=APELLIDO,
        $dni=DNI,
        $salario=SALARIO,
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

    public function testExceptionFechaFutura() {
        // Test excepción en caso de ser una fecha futura
        $this->expectException(\Exception::class);
        $fechaActual = new \DateTime();
        $unaFechaFutura = $fechaActual->add(new \DateInterval('P10D'));
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
        // Test que muestra la comicion de los años de experiencia
        $fechaIngreso = new \DateTime("- 2 years");
        $fechaActual = new \DateTime();
        $antiguedad = $fechaIngreso->diff($fechaActual);
        $ca = $this->crear($fechaIngreso=$fechaIngreso);
        $comisionFinal = $antiguedad->y . "%";
        $this->assertEquals($comisionFinal, $ca->calcularComision());
    }

    public function testCalcularIngresoTotalFuncionaCorrectamente() {
        // Test para calcular el ingreso total
        $fechaIngreso = new \DateTime("- 2 years");
        $fechaActual = new \DateTime();
        $antiguedad = $fechaIngreso->diff($fechaActual);
        $ingresoTotal = SALARIO + ((SALARIO * $antiguedad->y ) / 100); 

        $ca = $this->crear($fechaIngreso=$fechaIngreso);
        $this->assertEquals($ingresoTotal, $ca->calcularIngresoTotal());
    }

    public function testNoProporcionaFechaIngreso(){
        // Test si pasa null como fecha de ingreso
        $ca = $this->crear();
        $fechaHoy = new \DateTime();
        $resultadoEsperado = $fechaHoy->format('Y-m-d');
        $resultadoObtenido = $ca->getFechaIngreso();
        $resultadoObtenido = $resultadoObtenido->format('Y-m-d');
        $this->assertEquals($resultadoEsperado, $resultadoObtenido);
    }

    public function testAntiguedadCeroPorNoProporcionarFechaIngreso(){
        $ca = $this->crear();
        $this->assertEquals("0" ,$ca->calcularAntiguedad());
    }
}
