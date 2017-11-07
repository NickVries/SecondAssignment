<?php require 'partials/header.php'; ?>

<h1>Registration</h1>

<form action="/register" method="POST">
    <label>
        Name:
        <input type="text" name="name" value="<?= $name ?>">
    </label>
    <div class="error"><?= $registrationErrors['nameError'] ?? '' ?></div>
    <label>
        Username:
        <input type="text" name="username">
    </label>
    <div class="error"><?= $registrationErrors['usernameError'] ?? '' ?></div>
    <div class="error"><?= $duplicateError ?? '' ?></div>
    <label>
        Password:
        <input type="password" name="password">
    </label>
    <div class="error"><?= $registrationErrors['passwordError'] ?? '' ?></div>
    <button>Register</button>
</form>

<div class="login-buttons">
    <div class="login-button">
        <a href="https://github.com/login/oauth/authorize?client_id=d77abb39c2b95aa9efb7">Login
            with Github</a>
    </div>
    <div class="google-login-button">
        <a href="google-login"></a>
    </div>
</div>

<?php require 'partials/footer.php'; ?>
