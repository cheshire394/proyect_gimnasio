<?php
// /controllers/TaskController.php
require_once __DIR__ . '/../models/Task.php';

class TaskController
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /ejemploMVC/?action=login');
            exit();
        }
        $tasks = Task::getAll();
        include __DIR__ . '/../views/tasks/index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = $_POST['task'] ?? '';
            if (!empty($task)) {
                Task::add($task);
            }
            header('Location: /ejemploMVC');
            exit();
        }
        include __DIR__ . '/../views/tasks/add.php';
    }
}
?>
