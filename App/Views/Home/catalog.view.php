<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Car[] $cars */
?>
<section class="filter-section">
    <div class="container">
        <div class="section-heading">
            <h1>Vyberte si svoje auto</h1>
            <p>Správa a ponuka vozidiel načítaná z databázy</p>
        </div>

        <div class="filter-actions">
            <a href="<?= $link->url('home.create') ?>" class="btn-dark">
                + Pridať nové vozidlo
            </a>
        </div>
    </div>
</section>

<section class="catalog-section">
    <div class="container">
        <div class="catalog-toolbar">
            <p class="results-count"><?= count($cars) ?> vozidiel v ponuke</p>
        </div>

        <div class="car-grid">
            <?php foreach ($cars as $car) : ?>
                <article class="car-card">
                    <div class="car-image-wrapper">
                        <img src="<?= e($car->getImage()) ?>"
                             alt="<?= e($car->getTitle()) ?>"
                             class="car-image">
                    </div>
                    <div class="car-body">
                        <h2 class="car-title"><?= e($car->getTitle()) ?></h2>
                        <p class="car-price">
                            <?= number_format($car->getPrice(), 2, ',', ' ') ?> €<span>/ deň</span>
                        </p>
                        <ul class="car-specs">
                            <li>
                                <span>⏱</span>
                                <?= number_format($car->getMileage(), 0, ',', ' ') ?> km
                            </li>
                            <li><span>⚙</span> <?= e($car->getTransmission()) ?></li>
                            <li><span>👥</span> <?= $car->getSeats() ?> osôb</li>
                            <li><span>🏁</span> <?= e($car->getFeature()) ?></li>
                        </ul>
                        <div class="card-actions">
                            <a href="<?= $link->url('home.edit', ['id' => $car->getId()]) ?>"
                               class="btn-card">
                                Upraviť
                            </a>
                            <a href="<?= $link->url('home.delete', ['id' => $car->getId()]) ?>"
                               class="btn-card btn-danger-card"
                               onclick="return confirm('Naozaj chcete vymazať toto vozidlo?');">
                                Vymazať
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
