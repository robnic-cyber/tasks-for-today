<?php helper('url'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $task ? 'Edit Task' : 'New Task' ?></title>
</head>
<body>
    <h1><?= $task ? 'Edit Task' : 'New Task' ?></h1>

    <?php foreach (session()->getFlashdata('errors') ?? [] as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>

    <form
        action="<?= site_url($task ? 'tasks/' . $task['id'] . '/update' : 'tasks/create') ?>"
        method="post"
    >
        <?= csrf_field() ?>

        <p>
            <label for="title">Title</label><br>
            <input
                id="title"
                name="title"
                maxlength="150"
                value="<?= esc(old('title') ?? ($task['title'] ?? '')) ?>"
                required
            >
        </p>

        <p>
            <label for="task_date">Task date</label><br>
            <input
                id="task_date"
                name="task_date"
                type="date"
                value="<?= esc(old('task_date') ?? ($task['task_date'] ?? '')) ?>"
                required
            >
        </p>

        <?php $status = old('status') ?? ($task['status'] ?? 'pending'); ?>
        <p>
            <label for="status">Status</label><br>
            <select id="status" name="status">
                <option value="pending" <?= $status === 'pending' ? 'selected' : '' ?>>
                    Pending
                </option>
                <option value="completed" <?= $status === 'completed' ? 'selected' : '' ?>>
                    Completed
                </option>
            </select>
        </p>

        <button type="submit">Save task</button>
    </form>

    <p><a href="<?= site_url('tasks') ?>">Back to Task List</a></p>
</body>
</html>