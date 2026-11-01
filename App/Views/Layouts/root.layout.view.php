<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Http\Request $request */

$currentAction = $_GET['a'] ?? 'index';
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARENT - Autopožičovňa</title>
    <link rel="stylesheet" href="<?= $link->asset('css/style.css') ?>">
    <link rel="icon" type="image/png" href="<?= $link->asset('favicons/carent-carent-logo.png') ?>">
</head>
<body class="<?= $currentAction === 'index' ? 'dark-theme' : '' ?>">

<header class="site-header">
    <div class="container header-inner">
        <!-- Checkbox pre otváranie menu -->
        <input type="checkbox" id="menu-toggle" class="menu-checkbox">
        <label for="menu-toggle" class="menu-btn" aria-label="Otvoriť menu">
            <span class="hamburger-icon"></span>
        </label>

        <!-- Logo smerujúce na úvodnú stránku -->
        <a href="<?= $link->url('home.index') ?>" class="brand-logo">CARENT</a>

        <div class="header-actions">
            <a href="#" class="btn-outline-light">Prihlásenie / Registrácia</a>
        </div>

        <!-- Rozbaľovacie navigačné menu s dynamickou triedou active -->
        <nav class="main-nav">
            <ul class="nav-list">
                <li>
                    <a href="<?= $link->url('home.index') ?>" class="<?= $currentAction === 'index' ? 'active' : '' ?>">
                        Domov
                    </a>
                </li>
                <li>
                    <a href="<?= $link->url('home.catalog') ?>" class="<?= $currentAction === 'catalog' ? 'active' : '' ?>">
                        Prenájom (Katalóg áut)
                    </a>
                </li>
                <li><a href="#">Zdieľanie</a></li>
                <li><a href="#">O nás</a></li>
                <li><a href="#">Kontakt</a></li>
                <li class="nav-divider"></li>
                <li><a href="#">Moje rezervácie</a></li>
                <li><a href="#">Pomoc</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="main-content">
    <?= $contentHTML ?>
</main>

<footer class="site-footer">
    <div class="container footer-inner">
        <a href="<?= $link->url('home.index') ?>" class="brand-logo">CARENT</a>

        <ul class="footer-links">
            <li><a href="<?= $link->url('home.catalog') ?>">Prenájom</a></li>
            <li><a href="#">Zdieľanie</a></li>
            <li><a href="#">O nás</a></li>
            <li><a href="#">Kontakt</a></li>
        </ul>

        <div class="footer-socials">
            <a href="#" aria-label="Instagram">IG</a>
            <a href="#" aria-label="Facebook">FB</a>
            <a href="#" aria-label="Twitter">TW</a>
            <a href="#" aria-label="YouTube">YT</a>
        </div>
    </div>
</footer>

</body>
</html>