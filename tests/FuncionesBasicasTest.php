<?php

abstract class FuncionesBasicasTest extends \PHPUnit\Framework\TestCase {
 
	 public function testGetNombreApelldioFuncionaBien() {
		$ca = $this->crear();
		$this->assertEquals("Fulano De Tal", $ca->getNombreApellido());
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
		$this->assertEquals("Fulano De Tal 11111111 10000", $ca->__toString());
	}
	public function testNombreEmpleadoVacio(){
		$this->expectException(\Exception::class);
		$ca = $this->crear(1000,[100,200],"","" );
	}	
	public function testDNIVacio(){
		$this->expectException(\Exception::class);
		$ca = $this->crear(1000,[100,200],"Fulano","De Tal","");
	}
	public function testSalarioVacio(){
		$this->expectException(\Exception::class);
		$ca = $this->crear("",[100,200]);
	}
}
