# Développement par les tests

Les tests permettent de tester des fonctionnalités et les résultats attendus. Ceux-ci sont énoncés souvent sous forme de "règles métier". Les tests permettent de **garantir** ces règles métier.

Le but des tests est théoriquement d'anticiper tous les cas de figure (ou presque).

## tests unitaires

On teste des unités, qui n'ont pas de dépendances.

- librairie utilisee dans ce projet :
  - [PHPUnit](https://phpunit.de/)
  - [documentation PHPUnit](https://docs.phpunit.de/en/11.5/writing-tests-for-phpunit.html)
- une classe ou une petite partie du code ;
- les autres objets ne doivent pas gêner le test ;
- exemples possibles dans ce projet :
  - `Glace`
  - `Commande`
  - `Stock`
  - `Caisse`
  - `Client`
  - `Saveur`

## tests d'intégration

Ils permettent de tester des fonctionnalités qui regroupent plusieurs unités.

- librairie utilisee dans ce projet :
  - [PHPUnit](https://phpunit.de/)
  - [documentation PHPUnit](https://docs.phpunit.de/en/11.5/organizing-tests.html)

- plusieurs classes travaillent ensemble ;
- on vérifie un vrai cas d'usage métier ;
- exemples possibles dans ce projet :
  - création d'une commande
  - calcul du prix total
  - vérification du stock
  - mise à jour de la caisse
  - refus d'une commande impossible

## tests e2e

Aussi appelé end to end ou test "de bout en bout", il sert à simuler un comportement utilisateur réel.

- outils utilises dans ce projet :
  - [PHPUnit](https://phpunit.de/)
  - [PHP en ligne de commande](https://www.php.net/manual/en/features.commandline.php)

- on part d'un vrai point d'entrée ;
- on traverse plusieurs couches de l'application ;
- on vérifie un résultat visible ;
- exemples possibles dans ce projet :
  - un utilisateur passe une commande valide
  - un utilisateur passe une commande invalide
  - plusieurs commandes sont enchaînées

# TDD

Test Driven Development : On écrit d'abord les tests, puis ensuite on fait le code.

- cycle :
  - `Red`
  - `Green`
  - `Refactor`

- preuve attendue dans Git :
  - avant d'écrire un nouveau test : commit `before test: ...`
  - juste après avoir rédigé le test : commit `after test: ...`


❓ quel est l'intérêt de faire les tests avant le code ?
- on sait ce qu'on attend et donc on développe autour de ça
- se forcer à penser à tous les cas de figure

# TP

Jeu vidéo de glaces en PHP.
- gestion de stock
- goûts
- type (cornet / pot etc...)
- température

Règles du jeu : 
- les client viennent régulièrement dans le temps
- on doit vendre le plus de glaces possibles
- les clients demandent des goûts et des types (cornet / pot)
- les clients peuvent commander plusieurs glaces
- il faut prévoir du temps pour donner les glaces
- une glace peut se périmer ou fondre

## TP1

Lister moi tous les éléments dont vous allez avoir besoin dans le **code métier** pour la réalisation de ce projet.
- classes
- méthodes
- interfaces
- abstractions
- attributs
- etc...

## TP2

lister les tests & vérifications à faire pour chaque classe pour avoir un code ultra verrouillé !!!

- On commence par la classe "Glace"

-> vous pouvez aussi lister s'il manque des éléments (attributs, méthodes etc...)

## TP3

Commencer à coder l'application avec des tests unitaires.

- choisir plusieurs classes métier à implémenter ;
- écrire les tests avant le code ;
- faire avancer le coeur métier ;
- produire une première base solide.

Exemples de classes :

- `Glace`
- `Saveur`
- `Commande`
- `Client`
- `Stock`
- `Caisse`
- `Settings`

## TP4

Continuer à coder l'application avec des tests d'intégration.

- assembler plusieurs objets réels ;
- tester de vrais cas d'usage métier ;
- vérifier que les classes collaborent correctement ;
- faire avancer le comportement global du projet.

Exemples de scénarios :

- créer une commande ;
- ajouter plusieurs glaces ;
- vérifier le stock ;
- mettre à jour la caisse ;
- refuser une commande impossible.

## TP5

Terminer une première version complète de l'application avec des tests e2e.

- choisir un vrai point d'entrée ;
- tester un parcours complet ;
- vérifier un résultat visible ;
- obtenir une application exécutable.

Exemples de points d'entrée :

- un script PHP ;
- une façade applicative ;
- un point d'entrée HTTP simple.
















<!-- Les objectifs de tests -->
- tests intégrité
- tests de non regression

## Mise en place PHP

Le projet contient maintenant une base de travail pour PHP avec :

- `composer.json` pour la gestion des dependances ;
- `phpunit.xml` pour la configuration des tests ;
- `bin/glacier.php` comme exemple de point d'entree CLI ;
- `src/` pour le code applicatif ;
- `tests/Unit/` pour les tests unitaires.
- `tests/Integration/` pour les tests d'intégration ;
- `tests/E2E/` pour les tests e2e ;
- exemples fournis :
  - `tests/Unit/GlaceTest.php`
  - `tests/Integration/ServiceCommandeTest.php`
  - `tests/E2E/GlacierCliTest.php`

## Commandes utiles

Installer les dependances :

```bash
composer install
```

Lancer tous les tests :

```bash
composer test
```

Lancer uniquement les tests unitaires :

```bash
composer test:unit
```

Lancer uniquement les tests d'integration :

```bash
composer test:integration
```

Lancer uniquement les tests e2e :

```bash
composer test:e2e
```

Exemples de suites à ajouter dans `phpunit.xml` :

- `unit`
- `integration`
- `e2e`
