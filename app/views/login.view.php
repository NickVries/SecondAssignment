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
        <a href="https://github.com/login/oauth/authorize?client_id=d77abb39c2b95aa9efb7">
            Login with Github
        </a>
    </div>
    <div class="google-login-button">
        <a href="google-login"></a>
    </div>
</div>

<h3>Don't have an account yet?</h3>
<div class="register-button">
    <a href="register">Register</a>
</div>
<?php require 'partials/footer.php'; ?>
