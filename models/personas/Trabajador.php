<?php
require_once('datosIncorrectos.php'); 

class Trabajador extends Persona {

    
    private $funcion; 
    private $sueldo; 
    private $tipo_contrato; 
    private $jornada; 
    private $horas_extra; 
    private $cuenta_bancaria;

    private static $trabajadores = [
        'recepcionistas' => [],
        'monitores'=> [],
    ]; 

    
          
    function __construct(
        $dni, $nombre, $apellidos, $fecha_nac, $telefono, $email, 
        $funcion = 'recepcionista', $sueldo = 1100, $tipo_contrato = 'indefinido', 
        $jornada = 40, $horas_extra = 0, $cuenta_bancaria = null) {

    $this->funcion = $funcion;
    $this->sueldo = $sueldo;
    $this->tipo_contrato = $tipo_contrato;
    $this->jornada = $jornada;
    $this->horas_extra = $horas_extra;

    if (!$cuenta_bancaria) {
        $this->cuenta_bancaria = null;
    } else {
        $this->cuenta_bancaria = $this->validarCuentaBancaria($cuenta_bancaria); 
    }

    parent::__construct($dni, $nombre, $apellidos, $fecha_nac, $telefono, $email);
    
    if($funcion == 'recepcionista')self::$trabajadores['recepcionistas'][]=$this; 
    else self::$trabajadores['monitores'][]=$this; 
}

        

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value; 
        } else {
            throw new Exception('ERROR EN EL SETTER TRABAJADOR: LA PROPIEDAD QUE DESEAS MODIFICAR NO EXISTE'); 
        }
    }

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name; 
        } else {
            throw new Exception('ERROR EN EL GETTER TRABAJADOR: LA PROPIEDAD QUE DESEAS OBTENER NO EXISTE');
        }
    }

    public function validarCuentaBancaria($cuenta) {
        
        $cuenta = trim($cuenta);
        if (substr($cuenta, 0, 2) === 'ES' && strlen($cuenta) === 24) {
            
            $numeros = substr($cuenta, 2);
            /*usamos ctype_digit, porqué es más restrictivo que is_numeric y no permite usar números negativos */
            if (ctype_digit($numeros)) {
                return $cuenta; 
            }
        }
    
        throw new datosIncorrectos('ERROR: LA CUENTA BANCARIA INTRODUCIDA NO ES VÁLIDA');
    }

    public static function mostrarTrabajadores() {
        foreach (self::$trabajadores as $key => $Arr_obj) {
            
            echo "<h3>Trabajadores con función <b>$key:</b></h3><br>";
    
            foreach ($Arr_obj as $objeto) {
                
                $propiedades = get_object_vars($objeto);
    
                foreach ($propiedades as $propiedad => $valor) {
                    echo "<b>$propiedad</b>: $valor<br>";
                }
    
                echo "<br>"; 
            }
        }
    }


    
    
}


?>