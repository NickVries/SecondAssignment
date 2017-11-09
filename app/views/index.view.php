<?php require 'partials/header.php'; ?>

<div class="user">
    <?php if ($currentUser) : ?>
        <div class="name">
            <h1>Welcome <?= $currentUser->name; ?>!</h1>
        </div>
        <div class="avatar">
            <img src="<?= $currentUser->avatar ?>" alt="">
        </div>
    <?php else : ?>
        <h1><a href="login">Login</a> to continue.</h1>
    <?php endif; ?>
</div>

<?php require 'partials/footer.php' ?>
