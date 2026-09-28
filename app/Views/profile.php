<h1>Profile</h1>
<p><a href="/">Today's Tasks</a></p>

<?php if ($user === null): ?>
    <p>No demo user found.</p>
<?php else: ?>
    <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
    <p><strong>Full name:</strong> <?= esc($user['full_name']) ?></p>
    <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
<?php endif; ?>