<?php

class FuncionesBasicasTest extends \PHPUnit\Framework\TestCase {

    public function crear(
        $salario = 10000,
        Array $montos = [],
        $nombre = "Fulano",
        $apellido = "deTal",
        $dni = 11111111
    ) {
        $ca = new \App\Empleado(
            $nombre,
            $apellido,
            $dni,
            $salario,
            $montos
        );
        return $ca;
    }

    public function testgetNombreApelldioFuncionaBien() {
		$ca = $this->crear();
		$this->assertEquals("Fulano deTal", $ca->getNombreApellido());
	}
    public function testGetDNIFuncionaBien() {
		$ca = $this->crear();
		$this->assertEquals("11111111", $ca->getDNI());
    }
    
    public function testGetSalarioFuncionaBien() {
		$ca = $this->crear();
		$this->assertEquals(10000, $ca->getSalario());
    }
    
    public function testSetSectorFuncionaBien() {
        $ca = $this->crear();
        $ca->setSector("Informatica");
	    $this->assertEquals("Informatica",$ca->getSector());
    }
        public function testToString() {
		$ca = $this->crear();
		$this->assertEquals("Fulano deTal 11111111 10000", $ca->__toString());
    }


}
