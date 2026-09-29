<?php helper('url'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Tasks for Today</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p><?= esc(session()->getFlashdata('error')) ?></p>
    <?php endif; ?>

    <?php foreach (session()->getFlashdata('errors') ?? [] as $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach; ?>

    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label for="username">Username</label><br>
            <input id="username" name="username" required>
        </p>

        <p>
            <label for="password">Password</label><br>
            <input id="password" name="password" type="password" required>
        </p>

        <button type="submit">Log in</button>
    </form>

    <p><a href="<?= site_url('tasks') ?>">Back to Task List</a></p>
</body>
</html>