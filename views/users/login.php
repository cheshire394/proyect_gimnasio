<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Usuarios / Empleados</title>
</head>
<body>

    <header>
        <h1>Acceso general para cualquier usuario</h1>
    </header>

    <!-- Formulario de inicio de sesión -->
    <main>
    <form method="POST" action="/ejemploMVC/?action=login_usuario">
            <fieldset>
                <legend>Datos de acceso</legend>
                
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>

                <label for="password">Confirmar Contraseña:</label>
                <input type="password" id="check_password" name="check_password" placeholder="Contraseña" required>
                
                <button type="submit">Entrar</button>
            </fieldset>
        </form>

        <br>

        <nav>
            <fieldset>
                <legend>¿No estás registrado?</legend>
                    <p>** Acuda a recepción para registrase **</p>
            </fieldset>
        </nav>
    </main>

</body>
</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el email pertenece a un usuario
    if (isset($_SESSION['user']) && $_SESSION['user']['email'] === $email) {
        header("Location: /views/users/pag_usuarios.php");
        exit();
    }

    // Verificar si el email pertenece a un empleado
    if (isset($_SESSION['employee']) && $_SESSION['employee']['email'] === $email) {
        header("Location: /views/users/ckeck_employee.php");
        exit();
    }

    // Si no coincide ningún email
    echo "Credenciales no válidas.";
    exit();
}

