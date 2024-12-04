<?php
// /models/Task.php
session_start();

class Task
{
    public static function getAll()
    {
        return $_SESSION['tasks'][$_SESSION['user']] ?? [];
    }

    public static function add($task)
    {
        $_SESSION['tasks'][$_SESSION['user']][] = $task;
    }
}
?>
