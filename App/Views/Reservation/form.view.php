<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Reservation $reservation */
/** @var \App\Models\Car[] $cars */

$isEdit = $reservation->getId() !== null;
$defaultDate = $reservation->getDate() !== ''
        ? $reservation->getDate()
        : date('Y-m-d');
?>
<section class="filter-section">
    <div class="container">
        <div class="section-heading">
            <h1><?= $isEdit ? 'Upraviť rezerváciu' : 'Nová rezervácia vozidla' ?></h1>
            <p>Vyberte vozidlo z ponuky a vyplňte údaje o zákazníkovi</p>
        </div>

        <form class="filter-form" action="<?= $link->url('reservation.save') ?>" method="post">
            <input type="hidden" name="id" value="<?= $reservation->getId() ?>">

            <div class="filter-grid">
                <div class="form-group">
                    <label for="car">Vybrané vozidlo</label>
                    <select id="car" name="car" required>
                        <?php foreach ($cars as $carItem) : ?>
                            <option value="<?= $carItem->getId() ?>"
                                    <?= $reservation->getCarId() === $carItem->getId() ? 'selected' : '' ?>>
                                <?= e($carItem->getTitle()) ?>
                                (<?= number_format($carItem->getPrice(), 2, ',', ' ') ?> € / deň)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="customer">Meno a priezvisko</label>
                    <input type="text" id="customer" name="customer" required
                           value="<?= e($reservation->getCustomer()) ?>"
                           placeholder="napr. Martin Kováč">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required
                           value="<?= e($reservation->getEmail()) ?>"
                           placeholder="napr. martin@example.com">
                </div>

                <div class="form-group">
                    <label for="phone">Telefón</label>
                    <input type="tel" id="phone" name="phone" required
                           value="<?= e($reservation->getPhone()) ?>"
                           placeholder="napr. +421 905 123 456">
                </div>

                <div class="form-group">
                    <label for="date">Dátum vyzdvihnutia</label>
                    <input type="date" id="date" name="date" required
                           value="<?= e($defaultDate) ?>">
                </div>

                <div class="form-group">
                    <label for="days">Počet dní prenájmu</label>
                    <input type="number" id="days" name="days" min="1" max="365" required
                           value="<?= $reservation->getDays() ?>">
                </div>

                <div class="form-group">
                    <label for="status">Stav rezervácie</label>
                    <select id="status" name="status">
                        <?php
                        $statuses = ['Potvrdená', 'Čaká na schválenie', 'Ukončená', 'Zrušená'];
                        foreach ($statuses as $statusOption) :
                            ?>
                            <option value="<?= $statusOption ?>"
                                    <?= $reservation->getStatus() === $statusOption ? 'selected' : '' ?>>
                                <?= $statusOption ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="filter-actions">
                <button type="submit" class="btn-dark">
                    <?= $isEdit ? 'Uložiť zmeny' : 'Vytvoriť rezerváciu' ?>
                </button>
                <a href="<?= $link->url('reservation.index') ?>" class="btn-text">Zrušiť</a>
            </div>
        </form>
    </div>
</section>
