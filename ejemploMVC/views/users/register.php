<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>

    <h1>Registrarse</h1>

    <!-- registro de cualquier tipo de cliente (el mínimo) -->
    <form action="/ejemploMVC/?action=register" method="POST">
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
            <input type="password" name="check_password" placeholder="Repite la contraseña" required>
        </fieldset>

        <br>
        <button type="submit">Registrar</button>
    </form>

    <br>
    <a href="/ejemploMVC/?action=login">Volver al login</a>
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
