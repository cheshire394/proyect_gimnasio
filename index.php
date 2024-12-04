<?php

function autocargadorPersonas($clase) {
    require_once(__DIR__ . '/models/personas/' . $clase . ".php"); // Se corrigió la ruta.
}

spl_autoload_register('autocargadorPersonas');

try {
   

    //OBJETOS DE LA CLASE PERSONAS-> TRABAJADORES

  

    //MONITORES: 

     // Monitora de Boxeo
    $monitor_boxeo = new Monitor(
        '50489319H',              // DNI
        'Laura',                   // Nombre
        'Rodriguez Vallejo',       // Apellidos
        '1994-06-17',              // Fecha de nacimiento
        '650448327',               // Teléfono
        'ejemplo@gmail.com',       // Email
        'monitor',                 // funcion
        1100,                      // Sueldo (opcional, valor por defecto)
        'indefinido',              // Tipo de contrato (opcional, valor por defecto)
        40,                        // Jornada (opcional, valor por defecto)
        0,                         // Horas extra (opcional, valor por defecto)
        'ES9123456789012345678901',// Cuenta bancaria
        ['boxeo'],   // Disciplinas definidas dentro del constructor
        []                         // Clases vacías como ejemplo
    );

    // Monitor de Taekwondo y Karate
$monitor_taekwondo_karate = new Monitor(
    '50489319H',                 // DNI
    'Carlos',                  // Nombre
    'Gómez Pérez',             // Apellidos
    '1990-03-12',              // Fecha de nacimiento
    '691234567',               // Teléfono
    'carlos@gmail.com',        // Email
    'monitor',                 // Función
    1200,                      // Sueldo (opcional)
    'indefinido',              // Tipo de contrato
    40,                        // Jornada
    0,                         // Horas extra
    'ES9234567890123456789012',// Cuenta bancaria
    ['taekwondo', 'karate'],   // Disciplinas
    []                         // Clases vacías
);

// Monitor de Judo
$monitor_judo = new Monitor(
    '50489319H',              // DNI
    'Ana',                    // Nombre
    'Martínez López',         // Apellidos
    '1988-09-23',             // Fecha de nacimiento
    '677123456',              // Teléfono
    'ana.judo@gmail.com',     // Email
    'monitor',                // Función
    1150,                     // Sueldo (opcional)
    'indefinido',             // Tipo de contrato
    40,                       // Jornada
    0,                        // Horas extra
    'ES9345678901234567890123',// Cuenta bancaria
    ['judo'],                 // Disciplinas
    []                        // Clases vacías
);


//recepcionistas:
$recepcionista1 = new Trabajador(
    '50489319H',              // DNI
    'Nuria',                    // Nombre
    'González López',         // Apellidos
    '1975-08-23',             // Fecha de nacimiento
    '677123456',              // Teléfono
    'nuria_lopez@gmail.com',     // Email
    'recepcionista',                // Función
    1150,                     // Sueldo (opcional)
    'indefinido',             // Tipo de contrato
    40,                       // Jornada
    0,                        // Horas extra
    'ES9345678921244368890123',// Cuenta bancaria
); 

$recepcionista2 = new Trabajador(
    '50489319H',              // DNI (válido)
    'María',                   // Nombre
    'Fernández Ruiz',          // Apellidos
    '1982-04-15',              // Fecha de nacimiento
    '612345678',               // Teléfono
    'maria_ruiz@gmail.com',    // Email
    //resto de valores establecidos por defecto
);

//echo $recepcionista2->$email; 

 Trabajador::mostrarTrabajadores(); 


}catch(datosIncorrectos $e){
    echo $e->datosIncorrectos(); 
}catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
