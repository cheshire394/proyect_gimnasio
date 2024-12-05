<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleado</title>
</head>
<body>

    <header>
        <h1>Registrar Empleado</h1>
    </header>

    <!-- Formulario de registro de empleado -->
    <main>
            <!-- Datos personales -->
            <fieldset>
                <legend>Datos del Trabajador</legend>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" placeholder="Nombre" required>
                
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
                
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                
                <label for="f_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="f_nacimiento" name="f_nacimiento" required>
                
                <label for="tlf">Teléfono de Contacto:</label>
                <input type="text" id="tlf" name="tlf" placeholder="Teléfono de contacto" required>
            </fieldset>

            <!-- Datos bancarios -->
            <fieldset>
                <legend>Datos Bancarios</legend>

                <label for="iban">IBAN:</label>
                <input type="text" id="iban" name="iban" value="ES91 2100 0418 4502 0005 1332" required>

                <label for="nss">DNI / NIF:</label>
                <input type="text" id="dni" name="dni" placeholder="DNI / NIF" value="70418919A" required>

            </fieldset>

            <!-- Credenciales -->
            <fieldset>
                <legend>Credenciales</legend>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
            </fieldset>

          <!-- Tipo de trabajador -->
            <fieldset>
                <legend>Función</legend>
                <select id="funcion" name="funcion" required>
                    <option value="" disabled selected>Seleccione una función</option>
                    <option value="recep">Recepcionista</option>
                    <option value="monitor">Monitor</option>                
                </select>
            </fieldset>


            <br>
            <button type="submit">Registrar Empleado</button>

        <br>
        <br>
        <fieldset>
            <a href="/ejemploMVC/?action=register">¿No es empleado? Registro Empleados</a><br>
            <a href="/ejemploMVC/?action=login">Buscar Usuario / Empleado</a>
        </fieldset>
            
    </main>

</body>
</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $f_nacimiento = $_POST['f_nacimiento'];
    $tlf = $_POST['tlf'];
    $iban = $_POST['iban'];
    $dni = $_POST['dni'];
    $funcion = $_POST['funcion']; // Recepcionista o Monitor

    // Validar campos
    if (empty($name) || empty($apellido) || empty($email) || empty($f_nacimiento) || empty($tlf) || empty($funcion)) {
        echo "Por favor, complete todos los campos obligatorios.";
        exit();
    }

    // Guardar en la sesión
    $_SESSION['employee'] = [
        'name' => $name,
        'apellido' => $apellido,
        'email' => $email,
        'f_nacimiento' => $f_nacimiento,
        'tlf' => $tlf,
        'iban' => $iban,
        'dni' => $dni,
        'funcion' => $funcion
    ];

  
}

