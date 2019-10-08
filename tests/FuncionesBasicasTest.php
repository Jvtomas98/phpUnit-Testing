<?php

class FuncionesBasicasTest extends \PHPUnit\Framework\TestCase {

    public function crear(
        $salario = 10000,
        Array $montos = [],
        $nombre = "Fulano",
        $apellido = "deTal",
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

    public function testgetNombreApelldioFuncionaBien() {
		$ca = $this->crear();
		$this->assertEquals("Fulano deTal", ca->getNombreApellido());
	}
    public function testGetDNIFuncionaBien() {
		$ca = $this->crear();
		$this->assertEquals("11111111", ca->getDNI());
    }
    
    public function testGetSalarioFuncionaBien() {
		$ca = $this->crear();
		$this->assertEquals(10000, ca->getSalario());
    }
    
    public function testSetSectorFuncionaBien() {
		$ca = $this->crear();
		$this->assertEquals("Testing", ca->setSector());
    }
    public function testGetSectorFuncionaBien() {
		$ca = $this->crear();
		$this->assertEquals("No especificado", ca->getSector());
    } //Falta terminar el test de __tostring 
        public function testToString() {
		$ca = $this->crear();
		$this->assertEquals(, ca->__toString());
    }

}