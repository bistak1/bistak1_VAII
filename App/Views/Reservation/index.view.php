<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Reservation[] $reservations */
?>
<section class="filter-section">
    <div class="container">
        <div class="section-heading">
            <h1>Rezervácie vozidiel</h1>
            <p>Prehľad a správa rezervácií prepojených s katalógom vozidiel</p>
        </div>

        <div class="filter-actions">
            <a href="<?= $link->url('reservation.create') ?>" class="btn-dark">
                + Vytvoriť novú rezerváciu
            </a>
            <a href="<?= $link->url('home.catalog') ?>" class="btn-text">
                Späť na katalóg vozidiel
            </a>
        </div>
    </div>
</section>

<section class="catalog-section">
    <div class="container">
        <div class="catalog-toolbar">
            <p class="results-count"><?= count($reservations) ?> evidovaných rezervácií</p>
        </div>

        <div class="car-grid">
            <?php foreach ($reservations as $reservation) : ?>
                <?php
                $car = $reservation->getCar();
                $rawDate = $reservation->getDate();
                $timestamp = $rawDate !== '' ? strtotime($rawDate) : false;
                $formattedDate = $timestamp ? date('d. m. Y', $timestamp) : 'Neuvedený';
                ?>
                <article class="car-card">
                    <?php if ($car !== null) : ?>
                        <div class="car-image-wrapper">
                            <img src="<?= e($car->getImage()) ?>"
                                 alt="<?= e($car->getTitle()) ?>"
                                 class="car-image">
                        </div>
                    <?php endif; ?>

                    <div class="car-body">
                        <h2 class="car-title">
                            <?= $car !== null ? e($car->getTitle()) : 'Neznáme vozidlo' ?>
                        </h2>
                        <p class="car-price">
                            <?= number_format($reservation->getTotalPrice(), 2, ',', ' ') ?> €
                            <span>/ <?= $reservation->getDays() ?> dní (od <?= e($formattedDate) ?>)</span>
                        </p>

                        <ul class="car-specs" style="grid-template-columns: repeat(2, 1fr);">
                            <li>
                                <span>👤 Zákazník</span>
                                <strong><?= e($reservation->getCustomer()) ?></strong>
                            </li>
                            <li>
                                <span>📌 Stav</span>
                                <strong><?= e($reservation->getStatus()) ?></strong>
                            </li>
                            <li>
                                <span>✉ E-mail</span>
                                <?= e($reservation->getEmail()) ?>
                            </li>
                            <li>
                                <span>📞 Telefón</span>
                                <?= e($reservation->getPhone()) ?>
                            </li>
                        </ul>

                        <div class="card-actions">
                            <a href="<?= $link->url('reservation.edit', ['id' => $reservation->getId()]) ?>"
                               class="btn-card">
                                Upraviť
                            </a>
                            <a href="<?= $link->url('reservation.delete', ['id' => $reservation->getId()]) ?>"
                               class="btn-card btn-danger-card"
                               onclick="return confirm('Naozaj chcete vymazať túto rezerváciu?');">
                                Vymazať
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
