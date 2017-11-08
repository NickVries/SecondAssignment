<?php require 'partials/header.php'; ?>

<h2>Connect your Google and Github Accounts</h2>

<div class="login-buttons">
    <?php if (!$authenticatedUser->github_id) : ?>
    <div class="connect-button">
        <a href="https://github.com/login/oauth/authorize?client_id=d77abb39c2b95aa9efb7">
            Connect Github account
        </a>
    </div>
    <?php endif; ?>
    <?php if (!$authenticatedUser->google_id) : ?>
    <div class="google-login-button">
        <a href="google-login"></a>
    </div>
    <?php endif; ?>

<?php require 'partials/footer.php'; ?>
