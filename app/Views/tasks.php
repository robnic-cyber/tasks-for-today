<h1>All Tasks</h1>
<p><a href="/">Back to Today's Tasks</a></p>

<?php if (empty($tasks)): ?>
    <p>No tasks found.</p>
<?php else: ?>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= esc($task['task_date']) ?>:
                <?= esc($task['title']) ?> —
                <?= esc($task['status']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>