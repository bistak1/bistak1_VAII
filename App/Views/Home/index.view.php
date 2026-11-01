<?php
/** @var \Framework\Support\LinkGenerator $link */
?>
<div class="container">
    <section class="placeholder-box">
        <h1>Priestor pre hlavný obsah aplikácie</h1>
        <p>
            Toto je základné rozloženie (Master Layout) webovej aplikácie <strong>Autopožičovňa Carent</strong>.
            Obsahuje responzívnu hlavičku s rozbaľovacím menu, hlavnú obsahovú časť a pätičku.
        </p>
        <p>
            Pre zobrazenie implementovanej netriviálnej stránky (Katalóg vozidiel s filtrovaním) kliknite na tlačidlo nižšie alebo použite menu vľavo hore.
        </p>
        <a href="<?= $link->url('home.catalog') ?>" class="btn-primary">Prejsť na Katalóg vozidiel &rarr;</a>
    </section>
</div>