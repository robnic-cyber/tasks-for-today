<h1>Tasks for Today</h1>
<p>
    <a href="/tasks">All Tasks</a> |
    <a href="/profile">Profile</a> |
    <a href="/about">About</a>
</p>

<?php if (empty($tasks)): ?>
    <p>No tasks scheduled for today.</p>
<?php else: ?>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li><?= esc($task['title']) ?> — <?= esc($task['status']) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>