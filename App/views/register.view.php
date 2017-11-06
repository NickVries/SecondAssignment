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

<?php require 'partials/footer.php'; ?>
