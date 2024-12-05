<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>

    <h1>Registro Usuario</h1>

    <!-- registro de cualquier tipo de cliente (el mínimo) -->
    <form method="POST" action="/ejemploMVC/?action=register">

        <fieldset>
            <legend>Datos del Usuario/Invitado</legend>
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Apellidos" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="date" id="f_nacimiento" name="f_nacimiento" placeholder="Fecha de nacimiento" required>
            <input type="text" name="tlf" placeholder="Teléfono de contacto" required>
        </fieldset>

    <!-- Si va a ser socio, necesitamos esos datos extras -->
        <fieldset>
            <legend style="color: #B0B0B0; font-style: italic; font-size: 14px;">Si quieres domicilar el pago:</legend>
            <input type="text" name="iban" placeholder="IBAN">
            <input type="text" name="direccion" placeholder="Dirección">
            <input type="text" name="pais" placeholder="País">
        </fieldset>

    <!-- Formulario del adulto responsable si es menor de 18 -->
        <fieldset id="adulto-responsable" style="display: none;">
            <legend>Datos del Adulto Responsable</legend>
            <input type="text" name="n_adulto" placeholder="Nombre" required>
            <input type="text" name="a_adulto" placeholder="Apellido" required>
            <input type="date" name="f_adulto" placeholder="Fecha de nacimiento" required>
            <input type="email" name="email_adulto" placeholder="Email" required>
            <input type="text" name="tlf_adulto" placeholder="Teléfono" required>
        </fieldset>

    <!-- Contraseña -->
        <fieldset>
            <legend>Credenciales</legend>
            <input type="password" name="password" placeholder="Contraseña" required>
        </fieldset>

    <!-- Tipo de entrada -->
        <fieldset>
            <legend>Tipo de Entrada</legend>
            <select id="entrada" name="tipo_entrada" required>
                <option value="invitado">Invitado</option>
                <option value="socio">Socio</option>                
            </select>
        </fieldset>


        <br>
        <button type="submit">Registrar</button>
    </form>

    <br>
    <fieldset>
        <a href="/views/recep/employee_register.php">¿Es empleado? Registro Empleado</a>
        <!--Faltan enlaces-->
    </fieldset>

    <!-- Cuando la fecha es menor de 18, directamente aparece el formulario para adulto responsable 
     Hecho en javascript-->
    <script>
        document.getElementById('f_nacimiento').addEventListener('change', function () {
            const birthDate = new Date(this.value);
            const currentDate = new Date();
            const age = currentDate.getFullYear() - birthDate.getFullYear();
            const monthDiff = currentDate.getMonth() - birthDate.getMonth();
            const dayDiff = currentDate.getDate() - birthDate.getDate();

            // Ajusta la edad si no ha cumplido años este año
            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                age--;
            }

            const adultoResponsableFieldset = document.getElementById('adulto-responsable');
            if (age < 18) {
                adultoResponsableFieldset.style.display = 'block';
            } else {
                adultoResponsableFieldset.style.display = 'none';
            }
        });
    </script>

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
    $tipo_entrada = $_POST['tipo_entrada']; // Invitado o socio

    // Validar campos
    if (empty($name) || empty($apellido) || empty($email) || empty($f_nacimiento) || empty($tlf) || empty($tipo_entrada)) {
        echo "Por favor, complete todos los campos obligatorios.";
        exit();
    }

    // Guardar en la sesión
    $_SESSION['user'] = [
        'name' => $name,
        'apellido' => $apellido,
        'email' => $email,
        'f_nacimiento' => $f_nacimiento,
        'tlf' => $tlf,
        'tipo_entrada' => $tipo_entrada
    ];

    // Redirigir a la página de usuarios
    header("Location: /views/users/pag_usuarios.php");
    exit();
}

