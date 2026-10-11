# Autopožičovňa Carent

* **Meno a priezvisko:** Erik Bisták
* **Študijná skupina:** 5ZYI31

---

## Stručný opis projektu

Webová aplikácia slúži ako komplexný portál pre online prenájom motorových vozidiel. Je určená pre bežných zákazníkov,
ktorí si hľadajú auto na víkend alebo dlhodobý prenájom, ako aj pre administrátorov, ktorí spravujú vozový park a
prichádzajúce rezervácie. Hlavným účelom aplikácie je zjednodušiť výber vozidla, overenie jeho dostupnosti v danom
termíne, vytvorenie rezervácie a celkovú správu autopožičovne na jednom mieste.

## Role v projekte

* **Návštevník (Neregistrovaný používateľ):** Môže prezerať dostupnú ponuku áut, filtrovať vozidlá a zobrazovať si
  detailné informácie o jednotlivých modeloch.
* **Zákazník (Registrovaný používateľ):** Má prístup k vytváraniu rezervácií, môže spravovať a rušiť svoje vlastné
  rezervácie a upravovať svoje osobné údaje.
* **Správca (Admin):** Zodpovedá za kompletnú správu systému, pridávanie, úpravu a mazanie vozidiel (CRUD), správu
  kategórií alebo pobočiek a schvaľovanie či vybavovanie rezervácií zákazníkov.

## Prípady použitia podľa rolí

* **Návštevník:**
    * „Návštevník si vyhľadá vozidlo podľa kategórie alebo cenového rozpätia.“
    * „Používateľ sa zaregistruje do systému alebo sa prihlási pomocou svojho účtu.“
* **Zákazník:**
    * „Zákazník si vytvorí rezerváciu vozidla na zvolený termín od–do.“
    * „Zákazník si zobrazí zoznam svojich aktívnych a minulých rezervácií.“
* **Správca:**
    * „Správca pridá do systému nové vozidlo vrátane nahratia jeho fotografie.“
    * „Správca upraví parametre, cenu alebo stav existujúceho vozidla.“
    * „Správca zmení stav rezervácie v tabuľke pomocou editácie.“

## Plánované entity

* **Používateľ (`users`):** Eviduje prihlasovacie údaje, osobné informácie a rolu používateľa (zákazník/admin).
* **Vozidlo (`cars`):** Hlavná entita pre autá. Atribúty: značka, model, ročník, kategória, cena za deň, stav
  dostupnosti, cesta k fotografii.
* **Rezervácia (`reservations`):** Zaznamenáva prenájom. Atribúty: ID používateľa, ID auta, dátum začiatku, dátum konca,
  celková suma, stav rezervácie.
* **Kategória (`categories`):** Rozdeľuje autá do skupín (napr. SUV, Sedan, Hatchback, Elektromobil). Atribúty: názov
  kategórie, popis.

## Vzťahy medzi entitami

- **1:N (Používateľ ➔ Rezervácie):** Jeden používateľ môže vytvoriť viacero rezervácií, pričom každá rezervácia patrí
  práve jednému používateľovi.
- **1:N (Kategória ➔ Vozidlá):** Jedna kategória zahŕňa viaceré vozidlá.
- **1:N (Vozidlo ➔ Rezervácie):** Jedno auto môže mať v priebehu času naviazaných viacero rezervácií.

## Hlavné stránky aplikácie

1. **Domovská stránka:** Úvodný prehľad s uvítacím bannerom a ponukou najpopulárnejších áut.
2. **Katalóg áut:** Zoznam vozidiel s možnosťou dynamického filtrovania a triedenia.
3. **Detail auta a rezervácia:** Podrobné informácie o konkrétnom vozidle a rezervačný formulár na zvolený termín.
4. **Moje rezervácie:** Používateľská sekcia na prehľad, správu a prípadné zrušenie vlastných rezervácií.
5. **Administračný panel:** Zabezpečená sekcia pre správcu obsahujúca kompletné CRUD operácie nad vozidlami a správu
   rezervácií.


## Rozdelenie funkcionality

* **Základné funkcie:**
    * Autentifikácia používateľov (registrácia, bezpečné prihlásenie, hashovanie hesiel).
    * Zobrazenie katalógu áut, detailov a vytvorenie rezervácií.
    * Administrácia s kompletným CRUD nad autami a nahratím fotografií.
    * AJAX volania (filtrovanie áut v zozname, in-place zmena stavu rezervácie).

* **Rozširujúce funkcie:**
    * **Pokročilý dizajn a CSS:** Vlastné riešenie responzívneho dizajnu a využitie pokročilých vlastností štýlov
      (SASS/LESS) namiesto obyčajného CSS.
    * **Pokročilý JavaScript & HTML5 API:** Implementácia HTML5 API (napr. Geolocation API na vyhľadanie najbližšej
      pobočky) a komplexnejšia klientska validácia formulárov.
    * **Externé API a REST:** Využitie externého API (napr. aktuálne počasie v mieste vyzdvihnutia vozidla)
      prostredníctvom asynchrónnych požiadaviek.
    * **Pokročilý M:N dátový model:** Implementácia väzby M:N pre správu doplnkovej výbavy vozidiel (zákazník si pri
      vytváraní rezervácie môže k autu zvoliť voliteľné príslušenstvo).
