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

<div class="login-buttons">
    <div class="login-button">
        <a href="https://github.com/login/oauth/authorize?client_id=d77abb39c2b95aa9efb7">Login with Github</a>
    </div>
    <div class="google-login-button">
        <a href="https://www.googleapis.com/auth/plus.login"></a>
    </div>
</div>
    <?php require 'partials/footer.php'; ?>
