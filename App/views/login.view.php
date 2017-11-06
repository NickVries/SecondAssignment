<?php require 'partials/header.php'; ?>

<h1>Login</h1>

<form action="/login" method="POST">
    <div class="error"><?= $loginFailedError ?? '' ?></div>
    <label>
        Username:
        <input type="text" name="username">
    </label>
    <div class="error"><?= $loginErrors['username'] ?? '' ?></div>
    <label>
        Password:
        <input type="password" name="password">
    </label>
    <div class="error"><?= $loginErrors['password'] ?? '' ?></div>
    <button>Sign in</button>
</form>

<?php require 'partials/footer.php'; ?>
