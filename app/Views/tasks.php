<?php helper('url'); ?>

<h1>All Tasks</h1>
<p><a href="<?= site_url('/') ?>">Back to Today's Tasks</a></p>

<?php if (session()->has('user_id')): ?>
    <p><a href="<?= site_url('tasks/new') ?>">New Task</a></p>

    <form action="<?= site_url('logout') ?>" method="post">
        <?= csrf_field() ?>
        <button type="submit">Log out</button>
    </form>
<?php else: ?>
    <p><a href="<?= site_url('login') ?>">Log in to manage tasks</a></p>
<?php endif; ?>

<?php if (empty($tasks)): ?>
    <p>No tasks found.</p>
<?php else: ?>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= esc($task['task_date']) ?>:
                <?= esc($task['title']) ?> —
                <?= esc($task['status']) ?>

                <?php if (session()->has('user_id')): ?>
                    <a href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>">
                        Edit
                    </a>

                    <form
                        action="<?= site_url('tasks/' . $task['id'] . '/delete') ?>"
                        method="post"
                        style="display: inline"
                        onsubmit="return confirm('Archive this task?')"
                    >
                        <?= csrf_field() ?>
                        <button type="submit">Delete</button>
                    </form>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>