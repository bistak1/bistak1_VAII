<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Car $car */

$isEdit = $car->getId() !== null;
?>
<section class="filter-section">
    <div class="container">
        <div class="section-heading">
            <h1><?= $isEdit ? 'Upraviť vozidlo' : 'Pridať nové vozidlo' ?></h1>
            <p>Vyplňte údaje o vozidle pre uloženie do databázy</p>
        </div>

        <form class="filter-form" action="<?= $link->url('home.save') ?>" method="post">
            <input type="hidden" name="id" value="<?= $car->getId() ?>">

            <div class="filter-grid">
                <div class="form-group">
                    <label for="title">Názov vozidla</label>
                    <input type="text" id="title" name="title" required
                           value="<?= e($car->getTitle()) ?>"
                           placeholder="napr. Audi RS6 Avant 2022">
                </div>

                <div class="form-group">
                    <label for="price">Cena za deň (€)</label>
                    <input type="number" step="0.01" min="1" id="price" name="price" required
                           value="<?= $car->getPrice() > 0 ? $car->getPrice() : '' ?>"
                           placeholder="napr. 145.00">
                </div>

                <div class="form-group">
                    <label for="mileage">Nájazd (km)</label>
                    <input type="number" min="0" id="mileage" name="mileage" required
                           value="<?= $car->getMileage() ?>">
                </div>

                <div class="form-group">
                    <label for="transmission">Prevodovka</label>
                    <select id="transmission" name="transmission">
                        <option value="Automat"
                            <?= $car->getTransmission() === 'Automat' ? 'selected' : '' ?>>
                            Automatická
                        </option>
                        <option value="Manuál"
                            <?= $car->getTransmission() === 'Manuál' ? 'selected' : '' ?>>
                            Manuálna
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="seats">Počet miest</label>
                    <input type="number" id="seats" name="seats" min="1" max="9" required
                           value="<?= $car->getSeats() ?>">
                </div>

                <div class="form-group">
                    <label for="feature">Špecifikácia / Výbava</label>
                    <input type="text" id="feature" name="feature" required
                           value="<?= e($car->getFeature()) ?>"
                           placeholder="napr. Quattro 4x4">
                </div>

                <div class="form-group form-group-full">
                    <label for="image">URL adresa obrázka</label>
                    <input type="url" id="image" name="image" required
                           value="<?= e($car->getImage()) ?>"
                           placeholder="https://images.unsplash.com/...">
                </div>
            </div>

            <div class="filter-actions">
                <button type="submit" class="btn-dark">
                    <?= $isEdit ? 'Uložiť zmeny' : 'Pridať vozidlo' ?>
                </button>
                <a href="<?= $link->url('home.catalog') ?>" class="btn-text">Zrušiť</a>
            </div>
        </form>
    </div>
</section>