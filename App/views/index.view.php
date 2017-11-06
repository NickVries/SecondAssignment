<?php require 'partials/header.php'; ?>

<div class="title">
    <?php if ($currentUser) : ?>
        <h1>Welcome <?= $currentUser->name; ?>!</h1>
    <?php else : ?>
        <h1><a href="login">Login</a> to continue.</h1>
    <?php endif; ?>
</div>

<?php require 'partials/footer.php' ?>
