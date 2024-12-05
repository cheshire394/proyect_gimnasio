<?php
require_once __DIR__ . '/controllers/AuthController.php';

$action = $_GET['action'] ?? 'login'; // Acción por defecto: login
$authController = new AuthController();

switch ($action) {
    case 'login':
        $authController->login();
        break;
    case 'buscar':
        $authController->buscar();
         break;
    case 'register':
        $authController->register();
        break;
    case 'employee_register':
        $authController->employee_register();
        break;
    case 'logout':
        $authController->logout();
        break;
    default:
        echo "Página no encontrada.";
        break;
}
