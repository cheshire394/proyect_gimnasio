<?php
require_once('datosIncorrectos.php'); 

class Trabajador extends Persona {

    const  HORAS_EXTRA=15; 
    private $funcion; 
    private $sueldo; 
    private $jornada; 
    private $horas_extra; 
    private $cuenta_bancaria;

    private static $trabajadores = [
        'recepcionistas' => [],
        'monitores'=> [],
    ]; 

    
      
    function __construct(
        $dni, $nombre, $apellidos, $fecha_nac, $telefono, $email, 
        $cuenta_bancaria, $funcion = 'recepcionista', $sueldo = 1100,$horas_extra = 0, $jornada =40) {
    
    
    $this->cuenta_bancaria = $this->validarCuentaBancaria($cuenta_bancaria); 
    $this->funcion = $funcion;
    $this->sueldo = $sueldo;
    $this->horas_extra = $horas_extra;
    $this->jornada = $jornada;
    

    //propiedades heredadas:
    parent::__construct($dni, $nombre, $apellidos, $fecha_nac, $telefono, $email);
    
    //los objetos son copiados en el array por referencia implicitamente, esto hace que el array que almacena los objetos
    // actualice sus datos cuando ejecutamos un setter sobre cualquier objeto. 
    if($funcion == 'recepcionista')self::$trabajadores['recepcionistas'][$this->dni]=$this; 
    else self::$trabajadores['monitores'][$this->dni]=$this; 
}

        

    public function __set($name, $value) {
        if (property_exists($this, $name)) {

            $this->$name = $value; 
            if($name == 'horas_extra') $this->cobrarHorasExtra();
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


    //será necesario trabajar con ellos en la clase --> "Clases", para asignarles clases. 
    public static function getTrabajadoresMonitores()
    {
        return SELF::$trabajadores['monitores'];
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
                
                $propiedades = get_object_vars($objeto); //obtenemos las propiedades del objeto
    
                foreach ($propiedades as $propiedad => $valor) {
                    echo "<b>$propiedad</b>: $valor<br>";
                }
    
                echo "<br>"; 
            }
        }
    }


    //Este metodo solo será llamado desde setter cuando se modifique las horas extra
    private function cobrarHorasExtra(){
        
        $aumento = $this->__get('horas_extra') * self::HORAS_EXTRA + $this->__get('sueldo'); 
        $this->__set('sueldo', $aumento);   
    }


    

}


?>