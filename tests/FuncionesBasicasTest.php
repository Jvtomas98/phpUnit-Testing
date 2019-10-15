<?php
require_once "utils.php";

abstract class FuncionesBasicasTest extends \PHPUnit\Framework\TestCase {

    public function testGetNombreApelldioFuncionaBien() {
        // Test si toma nombre y apellido
        $resultadoEsperado = NOMBRE . " " . APELLIDO;

        $ca = $this->crear();
        $this->assertEquals($resultadoEsperado, $ca->getNombreApellido());
    }

    public function testGetDNIFuncionaBien() {
        // Test si devuelve DNI
        $ca = $this->crear();
        $this->assertEquals(DNI, $ca->getDNI());
    }

    public function testGetSalarioFuncionaBien() {
        // Test que verifica que nos devuelve el salario asignado
        $ca = $this->crear();
        $this->assertEquals(SALARIO, $ca->getSalario());
    }

    public function testToString() {
        // Test el formato de toString
        $resultadoEsperado = NOMBRE . " " . APELLIDO . " ". DNI . " " . SALARIO;

        $ca = $this->crear();
        $this->assertEquals($resultadoEsperado, $ca->__toString());
    }

    public function testNombreEmpleadoVacio() {
        // Test excepción de nombre vacio
        $this->expectException(\Exception::class);
        $ca = $this->crear($nombre="");
    }

    public function testDNIVacio(){
        // Test excepción de un dni vacio
        $this->expectException(\Exception::class);
        $ca = $this->crear($dni="");
    }

    public function testSalarioVacio(){
        // Test excepción de salario vacio
        $this->expectException(\Exception::class);
        $ca = $this->crear($salario="");
    }

    public function testValidacionDNI(){
        // Test excepción de DNI invalido
        $this->expectException(\Exception::class);
        $ca = $this->crear($dni="11a11111");
    }

    public function testValidacionDNIConCaracters(){
        // Test excepción de DNI invalido
        $this->expectException(\Exception::class);
        $ca = $this->crear($dni="111!1111");
    }

    public function testNoEspecificadoSector(){
        // Test sector no especificado
        $ca = $this->crear();
        $this->assertEquals("No especificado", $ca->getSector());
    }

    public function testSetSectorFuncionaBien() {
        // Test verifica si asigna sector correctamente
        $sectorEsperado = "Informatica";

        $ca = $this->crear();
        $ca->setSector($sectorEsperado);
        $this->assertEquals($sectorEsperado, $ca->getSector());
    }
}

