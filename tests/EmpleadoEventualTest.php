<?php

class EmpleadoEventualTest extends \PHPUnit\Framework\TestCase {

    public function crear(
        $salario = 10000,
        Array $montos = [],
        $nombre = "Fulano",
        $apellido = "De Tal", 
        $dni = 41511603
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

	public function testCalculoComisionFuncionaBien() {
		$ca = $this->crear(1000, [1000,2000]);
		$this->assertEquals(75, $ca->calcularComision());
	}

	public function testCalcularIngresoTotalFuncionaCorrectamente() {
		$ca = $this->crear(1000, [1000,2000]);
		$this->assertEquals(1075, $ca->calcularIngresoTotal());
    }

    public function testValidacionMontoNegativo()
    {
        $this->expectException(\Exception::class);
        $ca = $this->crear(1000, [-300,1000]);
    }

    public function testValidacionMontoCero()
    {
        $this->expectException(\Exception::class);
        $ca = $this->crear(1000,[2500,0]);
    }
}
