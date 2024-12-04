<?php
// /controllers/AuthController.php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    // Maneja el inicio de sesión
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']); // Limpieza de datos
            $password = trim($_POST['password']);

            // Validar credenciales
            if (User::login($email, $password)) {
                // Redirigir al índice tras el login exitoso
                header('Location: /ejemploMVC/?action=index');
                exit();
            } else {
                echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
            }
        }
        // Incluir la vista del formulario de login
        include __DIR__ . '/../views/users/login.php';
    }

    // Maneja el registro de usuarios normales
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            // Validar datos obligatorios
            if (empty($email) || empty($password)) {
                echo "El correo electrónico y la contraseña son obligatorios.";
                return;
            }

            // Verificar si el usuario ya existe
            $users = User::getAll();
            foreach ($users as $user) {
                if ($user['email'] === $email) {
                    echo "El correo electrónico ya está registrado.";
                    return;
                }
            }

            // Registrar al nuevo usuario
            User::register($email, $password);
            echo "Usuario registrado con éxito. <a href='/ejemploMVC/?action=login'>Inicia sesión aquí</a>.";
        } else {
            // Incluir la vista del formulario de registro
            include __DIR__ . '/../views/users/register.php';
        }
    }

    // Maneja el registro de empleados
    public function employee_register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Validar datos obligatorios
            if (empty($username) || empty($password)) {
                echo "El nombre de usuario y la contraseña son obligatorios.";
                return;
            }

            // Verificar si el empleado ya existe
            $users = User::getAll();
            foreach ($users as $user) {
                if ($user['username'] === $username) {
                    echo "El empleado ya está registrado.";
                    return;
                }
            }

            // Registrar al nuevo empleado
            User::register($username, $password);
            echo "Empleado registrado con éxito. <a href='/ejemploMVC/?action=login'>Inicia sesión aquí</a>.";
        } else {
            // Incluir la vista del formulario de registro de empleados
            include __DIR__ . '/../views/users/employee_register.php';
        }
    }

    // Maneja el cierre de sesión
    public function logout()
    {
        session_start();
        session_destroy(); // Destruir la sesión
        header('Location: /ejemploMVC'); // Redirigir al inicio
        exit();
    }
}
?>
