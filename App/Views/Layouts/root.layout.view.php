<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Http\Request $request */

$currentController = strtolower((string)($_GET['c'] ?? 'home'));
$currentAction = strtolower((string)($_GET['a'] ?? 'index'));
$isHomeIndex = $currentController === 'home' && $currentAction === 'index';
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARENT - Autopožičovňa</title>
    <link rel="stylesheet" href="<?= $link->asset('css/style.css') ?>">
    <link rel="icon" type="image/png" href="<?= $link->asset('favicons/carent-logo.png') ?>">
</head>
<body class="<?= $isHomeIndex ? 'dark-theme' : '' ?>">

<header class="site-header">
    <div class="container header-inner">
        <input type="checkbox" id="menu-toggle" class="menu-checkbox">
        <label for="menu-toggle" class="menu-btn" aria-label="Otvoriť menu">
            <span class="hamburger-icon"></span>
        </label>

        <a href="<?= $link->url('home.index') ?>" class="brand-logo">CARENT</a>

        <div class="header-actions">
            <a href="#" class="btn-outline-light">Prihlásenie / Registrácia</a>
        </div>

        <nav class="main-nav">
            <ul class="nav-list">
                <li>
                    <a href="<?= $link->url('home.index') ?>"
                       class="<?= $isHomeIndex ? 'active' : '' ?>">
                        Domov
                    </a>
                </li>
                <li>
                    <a href="<?= $link->url('home.catalog') ?>"
                       class="<?= $currentController === 'home' && $currentAction !== 'index' ? 'active' : '' ?>">
                        Prenájom (Katalóg áut)
                    </a>
                </li>
                <li>
                    <a href="<?= $link->url('reservation.index') ?>"
                       class="<?= $currentController === 'reservation' ? 'active' : '' ?>">
                        Rezervácie
                    </a>
                </li>
                <li><a href="#">Zdieľanie</a></li>
                <li><a href="#">O nás</a></li>
                <li><a href="#">Kontakt</a></li>
                <li class="nav-divider"></li>
                <li>
                    <a href="<?= $link->url('reservation.index') ?>">Moje rezervácie</a>
                </li>
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
            <li><a href="<?= $link->url('reservation.index') ?>">Rezervácie</a></li>
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
