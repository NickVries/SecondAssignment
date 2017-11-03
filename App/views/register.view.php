<?php require 'partials/header.php'; ?>

<h1>Registration</h1>

<form action="/register" method="POST">
    <label>
        Name:
        <input type="text" name="name" value="<?= $name ?>">
    </label>
    <?= $errors['nameError'] ?? '' ?>
    <label>
        Username:
        <input type="text" name="username">
    </label>
    <?= $errors['usernameError'] ?? '' ?>
    <?= $duplicateError ?? '' ?>
    <label>
        Password:
        <input type="password" name="password">
    </label>
    <?= !empty($errors['passwordError']) ? $errors['passwordError'] : '' ?><br>
    <button>Register</button>
</form>

<?php require 'partials/footer.php'; ?>
