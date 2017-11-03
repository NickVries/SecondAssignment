<?php use Nick\Framework\App; ?>

<nav>
    <ul>
        <li>
            <a href="/">Home</a>
            </li>
        <?php if (!App::get('authorisationService')->authenticatedUser()) : ?>
        <li>
            <a class="authenticator-button" href="login">Login</a>
        </li>
        <li>
            <a class="authenticator-button" href="register">Register</a>
        </li>
        <?php else : ?>
        <li>
            <a class="authenticator-button" href="logout">Logout</a>
        </li>
        <?php endif; ?>
    </ul>
</nav>