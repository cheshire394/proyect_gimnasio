<?php
class AuthController
{
    // Método para mostrar el formulario de inicio de sesión
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el inicio de sesión (credenciales)
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Verificar credenciales
            if ($email === 'admin@example.com' && $password === '123456') {
                $_SESSION['role'] = 'admin';
                header("Location: /views/admin/dashboard.php");
                exit();
            }

            // Ejemplo: Redirigir según tipo de usuario o empleado
            if (isset($_SESSION['user'])) {
                header("Location: /views/users/pag_usuarios.php");
            } elseif (isset($_SESSION['employee'])) {
                $funcion = $_SESSION['employee']['funcion'];
                if ($funcion === 'recep') {
                    header("Location: /views/recep/inicio_recep.php");
                } elseif ($funcion === 'monitor') {
                    header("Location: /views/monitores/inicio_monitores.php");
                }
            } else {
                echo "Credenciales inválidas.";
            }
        } else {
            include __DIR__ . '/../views/users/login.php';
        }
    }

    // Registro de usuarios
    public function register()
    {
        include __DIR__ . '/../views/users/register.php';
    }

    // Registro de empleados
    public function employee_register()
    {
        include __DIR__ . '/../views/employees/employee_register.php';
    }

    // Búsqueda de usuarios o empleados
    public function buscar()
    {
        include __DIR__ . '/../views/tasks/buscar.php';
    }

    // Cierra la sesión
    public function logout()
    {
        session_destroy();
        header("Location: /");
        exit();
    }
}
