<?php

class FuncionesBasicasTest extends \PHPUnit\Framework\TestCase {

    public function crear(
        $salario = 137455,
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


}