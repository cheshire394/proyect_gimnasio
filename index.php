<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function autocargadorPersonas($clase) {
    require_once(__DIR__ . "/models/" . $clase . ".php"); 
}
spl_autoload_register('autocargadorPersonas');

try {
   

    //OBJETOS DE LA CLASE PERSONAS-> TRABAJADORES

  

    //MONITORES: 
    
    $monitor_boxeo = new Monitor(
        '50489319H',              
        'Laura',                   
        'Rodriguez Vallejo',       
        '1994-06-17',              
        '650448327',               
        'laura_boxing@gmail.com',       
        'ES9123456789012345678901',
        'monitor',               
        1100,                      
        0,                        
        16,                         
        ['boxeo', 'kickboxing'],   
    );

   
$monitor_taekwondo_karate = new Monitor(
    '09626574Q',               
    'Carlos',                  
    'Gómez Pérez',             
    '1990-03-12',              
    '691234567',               
    'carlos@gmail.com',        
    'ES9234567890123456789012',
    'monitor',                
    1200,                      
    0,                        
    8,                         
    ['taekwondo', 'karate','boxeo'],  
   
);


$monitor_judo_aikido = new Monitor(
    '55462206Y',              
    'Ana',                    
    'Martínez López',         
    '1988-09-23',             
    '677123456',              
    'ana.judo@gmail.com',     
    'ES9345678901234567890123',
    'monitor',                
    1150,                     
    0,                       
    310,                       
    ['judo', 'aikido'],                 
                        
);


//recepcionistas:
$recepcionista1 = new Trabajador(
    '16280029P',              
    'Nuria',                   
    'González López',         
    '1975-08-23',             
    '677123456',             
    'nuria_lopez@gmail.com',    
    'ES9345678921244368890123',
    'recepcionista',         
    1150,                     
    0,                      
    40,                        
    
); 

$recepcionista2 = new Trabajador(
    '23040433E',              
    'María',                   
    'Fernández Ruiz',          
    '1982-04-15',              
    '612345678',               
    'maria_ruiz@gmail.com',    
    'ES9345678921244368890123',
    //resto de valores establecidos por defecto
);

 //modificamos las horas extra de dos trabajadores de distinas clases: 
 $recepcionista1->__set('horas_extra', 2); 
 $monitor_boxeo->__set('horas_extra',3); 

 


//CREAMOS TODAS LA CLASES NECESARIAS PARA CUBRIR NUESTRO HORARIO:  
//LUNES
$clase1 = new Clase('50489319H', 'boxeo', 'lunes',"10:00");
$clase2 = new Clase('50489319H', 'kickboxing', 'lunes',"12:00");
$clase3 = new Clase('50489319H', 'boxeo', 'lunes',"16:00");
$clase4 = new Clase('50489319H', 'kickboxing', 'lunes',"18:00");

//MARTES
$clase5 = new Clase('55462206Y', 'judo', 'martes',"10:00");
$clase6 = new Clase('55462206Y', 'aikido', 'martes',"12:00");
$clase7 = new Clase('55462206Y', 'judo', 'martes',"16:00");
$clase8 = new Clase('55462206Y', 'aikido', 'martes',"18:00");

//MIERCOLES
$clase9 = new Clase('50489319H', 'boxeo', 'miercoles',"10:00");
$clase10 = new Clase('50489319H', 'kickboxing', 'miercoles',"12:00");
$clase11 = new Clase('50489319H', 'boxeo', 'miercoles',"16:00");
$clase12 = new Clase('50489319H', 'kickboxing', 'miercoles',"18:00");

//JUEVES
$clase13 = new Clase('55462206Y', 'judo', 'jueves',"10:00");
$clase14 = new Clase('55462206Y', 'aikido', 'jueves',"12:00");
$clase15 = new Clase('55462206Y', 'judo', 'jueves',"16:00");
$clase16 = new Clase('55462206Y', 'aikido', 'jueves',"18:00");

//VIERNES
$clase17 = new Clase('09626574Q', 'taekwondo', 'viernes',"10:00");
$clase18 = new Clase('09626574Q', 'karate', 'viernes',"12:00");
$clase19 = new Clase('09626574Q', 'taekwondo', 'viernes',"16:00");
$clase20 = new Clase('09626574Q', 'karate', 'viernes',"18:00");

//SABADO
$clase17 = new Clase('50489319H', 'boxeo', 'sabado',"10:00");
$clase18 = new Clase('09626574Q', 'karate', 'sabado',"12:00");
$clase19 = new Clase('55462206Y', 'judo', 'sabado',"16:00");
$clase20 = new Clase('09626574Q', 'taekwondo','sabado',"18:00");




//Clase::mostrar_todas_Clases(); funciona bien
Clase::mostrar_Clases_filtradas('dni_monitor', '50489319H'); 
$clase1->sustituirMonitor('09626574Q'); 

echo "despues de modificar el monitor: "; 
Clase::mostrar_Clases_filtradas('dni_monitor', '50489319H'); 


//observar, que el salario  de los dos objetos a aumentado conforme a las horas extra automáticamente.
//tambien la jornada se ha modificado conforme a las clases asignadas
Trabajador::mostrarTrabajadores(); 





}catch(datosIncorrectos $e){
    echo $e->datosIncorrectos(); 
}catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
