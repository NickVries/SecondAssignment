<?php require 'partials/header.php'; ?>

<h1>Login</h1>

<form action="/login" method="POST">
    <label>
        Username:
        <input type="text" name="username">
    </label>
    <label>
        Password:
        <input type="password" name="password">
    </label>
    <button>Sign in</button>
</form>

<?php require 'partials/footer.php'; ?>
