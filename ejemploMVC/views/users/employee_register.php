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
        <form action="/ejemploMVC/?action=register" method="POST">
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
                <input type="text" id="iban" name="iban" placeholder="IBAN Ingreso" required>
                
                <label for="nss">Número de Seguridad Social:</label>
                <input type="text" id="nss" name="nss" placeholder="N. S.Social" required>
                
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" placeholder="Dirección" required>
                
                <label for="pais">País:</label>
                <input type="text" id="pais" name="pais" placeholder="País" required>
            </fieldset>

            <!-- Credenciales -->
            <fieldset>
                <legend>Credenciales</legend>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                
                <label for="check_password">Repite la Contraseña:</label>
                <input type="password" id="check_password" name="check_password" placeholder="Repite la contraseña" required>
            </fieldset>

            <br>
            <button type="submit">Registrar Empleado</button>
        </form>

        <br>
        <nav>
            <a href="/ejemploMVC/?action=login">Volver al Login</a>
        </nav>
    </main>

</body>
</html>
