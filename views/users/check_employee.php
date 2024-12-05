<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Empleados</title>
</head>
<body>

    <header>
        <h1>Acceso para Empleados</h1>
        <h3>Por motivos de seguridad, necesitamos una segunda comprobación:</h3>
    </header>

    <!-- Formulario de comprobación DNI -->
    <main>
        <form method="POST" action="/ejemploMVC/?action=login_usuario">
            <fieldset>
                <legend>Introduce tu DNI para acceder</legend>
                
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" placeholder="DNI" required>
                
                <button type="submit">Confirmar</button>
            </fieldset>
        </form>

        <br>

        <nav>
            <fieldset>
                <legend>Accesos</legend>
                <a href="/views/users/login.php">Volver</a>
            </fieldset>
        </nav>
    </main>

</body>
</html>


<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dni = trim($_POST['dni']);

    // Validar el formato del DNI (8 números y 1 letra)
    if (!preg_match('/^\d{8}[A-Za-z]$/', $dni)) {
        echo "Formato de DNI inválido.";
        exit();
    }

    // Verificar si el DNI pertenece a un empleado
    if (isset($_SESSION['employee']) && $_SESSION['employee']['dni'] === $dni) {
        $funcion = $_SESSION['employee']['funcion'];

        // Redirigir según la función del empleado
        if ($funcion === "recep") {
            header("Location: /views/recep/inicio_recep.php");
            exit();
        } elseif ($funcion === "monitor") {
            header("Location: /views/monitores/inicio_monitores.php");
            exit();
        }
    }

    // Si el DNI no coincide
    echo "El DNI ingresado no corresponde a un empleado registrado.";
    header('Location: /views/users/login.php');
    exit();

}

