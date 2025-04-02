<?php
    $task = trim($_POST['task']);
    $date= trim($_POST['due_date']);
    $tasksFile = 'tasks.json';
    if (empty($task)) {
        header('Location: index.php');
        exit;
    }

    if (file_exists($tasksFile)) {
        $tasks = json_decode(file_get_contents($tasksFile), true);
    } else {
        $tasks = [];
    }

    $tasks[] = [
        'task' => $task,
        'due_date' => $date
    ];
    file_put_contents($tasksFile, json_encode($tasks));

    header('Location: index.php');
    exit;

?>