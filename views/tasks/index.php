<?php include __DIR__ . '/../shared/header.php'; ?>
<h1>Lista de Tareas</h1>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li><?php echo htmlspecialchars($task); ?></li>
    <?php endforeach; ?>
</ul>
<a href="/ejemploMVC/?action=add">Añadir Tarea</a>
