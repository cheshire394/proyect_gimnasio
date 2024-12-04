<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>

    <header>
        <h1>Iniciar Sesión</h1>
    </header>

    <!-- Formulario de inicio de sesión -->
    <main>
    <form method="POST" action="/ejemploMVC/?action=login">
            <fieldset>
                <legend>Datos de acceso</legend>
                
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                
                <button type="submit">Entrar</button>
            </fieldset>
        </form>

        <nav>
            <p><a href="/ejemploMVC/?action=employee_register">¿Eres empleado? Regístrate aquí</a></p>
            <p><a href="/ejemploMVC/?action=register">¿Nuevo usuario? Regístrate aquí</a></p>
        </nav>
    </main>

</body>
</html>

