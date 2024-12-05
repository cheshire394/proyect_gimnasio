<?php include __DIR__ . '/../shared/header.php'; ?>
<h1>Añadir Nueva Tarea</h1>
<form action="/ejemploMVC/?action=add" method="POST">
    <input type="text" name="task" placeholder="Escribe una tarea" required>
    <button type="submit">Añadir</button>
</form>
<a href="/">Volver a la lista</a>
