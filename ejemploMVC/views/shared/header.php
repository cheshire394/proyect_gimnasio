<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Tareas</title>
</head>
<body>
    <header>
        <h1>Gestión de Tareas</h1>
        <?php if (isset($_SESSION['user'])): ?>
            <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']); ?> | 
               <a href="/ejemploMVC/?action=logout">Cerrar Sesión</a>
            </p>
        <?php else: ?>
            <p><a href="/ejemploMVC/?action=login">Iniciar Sesión</a></p>
        <?php endif; ?>
    </header>
    <hr>
