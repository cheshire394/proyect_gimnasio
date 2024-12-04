<?php

final class Monitor extends Trabajador {

    private $disciplinas = []; 
    private $clases = []; 

    function __construct(
        
        $dni, $nombre, $apellidos, $fecha_nac, $telefono, $email,
        $funcion, $sueldo = 1100, $tipo_contrato = 'indefinido',$jornada = 40, $horas_extra = 0, $cuenta_bancaria=null, 
        $disciplinas = [], $clases = []) {
        
        $this->disciplinas = $disciplinas; 
        $this->clases = $clases; 
        parent::__construct($dni, $nombre, $apellidos, $fecha_nac, $telefono, $email,'monitor', $sueldo, $tipo_contrato, $jornada, $horas_extra, $cuenta_bancaria); 
    }

    function __set($name, $value) {
        if ($name == 'clases' || $name == 'disciplinas') {
            $this->$name = $value;
        } else {
            parent::__set($name, $value); 
        }
    }

    function __get($name) {
        if ($name == 'clases' || $name == 'disciplinas') {
            return $this->$name; 
        } else {
            return parent::__get($name); 
        }
    }
}


?>