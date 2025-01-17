<?php
require_once "FuncionesBasicasTest.php";
require_once "utils.php";

class EmpleadoEventualTest extends FuncionesBasicasTest {

    public function crear(
        // Parms del method crear
        $dni=DNI,
        $salario=SALARIO,
        $montos=MONTOS,
        $nombre=NOMBRE,
        $apellido=APELLIDO
    ) {
        // Instancia la clase con los params del method
        $ca = new \App\EmpleadoEventual(
            $nombre,
            $apellido,
            $dni,
            $salario,
            $montos
        );
        return $ca;
    }

    public function testCalculoComisionFuncionaBien() {
        // Test que la comision sea correcta
        $montosVentas = [1000, 2000];
        $resultadoEsperado = ((1000 + 2000) / 2) * 0.05;

        $ca = $this->crear($dni=DNI,$salario=SALARIO, $montos=$montosVentas); // Si no pones salario tira error ????
        $this->assertEquals($resultadoEsperado, $ca->calcularComision());
    }

    public function testCalcularIngresoTotalFuncionaCorrectamente() {
        // Test devolucion del ingreso total por 2 ventas
        $montosVentas = [1000, 2000];
        $comision = ((1000 + 2000) / 2) * 0.05;
        $resultadoEsperado = $comision + SALARIO;

        $ca = $this->crear($dni=DNI,$salario=SALARIO, $montos=$montosVentas);
        $this->assertEquals($resultadoEsperado, $ca->calcularIngresoTotal());
    }

    public function testValidacionMontoNegativo() {
        // Test si ingresa negativo en una venta
        $this->expectException(\Exception::class);
        $ca = $this->crear($dni=DNI,$salario=SALARIO, $montos=[-300, 1000]);
    }

    public function testValidacionMontoCero() {
        // Test si ingresa 0 en una venta
        $this->expectException(\Exception::class);
        $ca = $this->crear($dni=DNI,$salario=SALARIO, $montos=[2500,0]);
    }
}
