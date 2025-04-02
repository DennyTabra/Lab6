<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>To Do List</title>
</head>
<body>
    <h1>To Do List</h1>
    <form method="POST" action="save_task_prim.php">
        <input type="text" name="task" placeholder="Enter your task here" required>
        <input type="date" name="due_date" placeholder="Due date">
        <button type="submit">ADD TASK</button>
        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
    </form>
    
    <h2>Your Tasks</h2>
    <ul>
        <?php
        $tasksFile = 'tasks.json';
        if (file_exists($tasksFile)) {
            $tasks = json_decode(file_get_contents($tasksFile), true);
            if (!empty($tasks)) {
                foreach ($tasks as $taskItem): ?>
                    <li>
                        <?php echo htmlspecialchars($taskItem['task']); ?>
                        <?php if (!empty($taskItem['due_date'])): ?>
                    Deadline: <?php echo htmlspecialchars($taskItem['due_date']); ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach;
            } else {
                echo '<li>No tasks found.</li>';
            }
        }
        ?>
    </ul>
</body>
</html>