# TP4

## Titre

Tests d'integration sur les premiers vrais cas d'usage

## Objectifs

- continuer a faire avancer l'application ;
- tester la collaboration entre plusieurs classes ;
- verifier des scenarios metier complets ;
- comprendre ce qu'on ne peut plus verifier avec des tests purement unitaires.

## Contexte

Vous avez commence a construire le coeur metier avec des tests unitaires.

Il faut maintenant assembler ces briques pour verifier que l'application se comporte correctement sur de vrais enchainements.

## Travail demande

Vous devez choisir plusieurs cas d'usage centraux de votre application et les couvrir avec des tests d'integration.

Exemples de cas d'usage possibles :

- creer une commande ;
- ajouter plusieurs glaces a une commande ;
- verifier le stock avant livraison ;
- mettre a jour la caisse apres une vente ;
- refuser une commande impossible ;
- gerer plusieurs commandes a la suite.

## Attendus minimum

- creation d'un dossier `tests/Integration/` ;
- ajout d'une suite `integration` dans `phpunit.xml` ;
- au moins 3 scenarios d'integration pertinents ;
- du code metier supplementaire dans `src/` pour faire avancer l'application.

## Ce qu'on attend ici

Un test d'integration doit faire collaborer plusieurs objets reels.

Par exemple :

- une `Commande` ;
- un `Stock` ;
- une `Caisse` ;
- eventuellement un `Client` ou un service qui orchestre le traitement.

## Contraintes

- utiliser de vrais objets metier ;
- eviter les mocks inutiles ;
- verifier l'etat observable a la fin du scenario ;
- choisir des scenarios qui font avancer le projet.
- avant d'ecrire un nouveau test d'integration, faire un commit de l'etat courant ;
- juste apres avoir redige le test, faire un second commit pour prouver la demarche TDD.
- convention demandee pour les messages de commit :
  `before test: ...` puis `after test: ...`.

## Livrables

- les tests dans `tests/Integration/` ;
- la mise a jour de `phpunit.xml` ;
- le code ajoute dans `src/` ;
- un historique Git montrant au moins, pour plusieurs scenarios, un commit avant le test puis un commit apres redaction du test ;
- une courte note expliquant :
  quels scenarios vous avez juges prioritaires pour construire l'application.

## Bonus

- ajouter un scenario de refus ;
- ajouter un scenario avec plusieurs commandes consecutives ;
- comparer un meme comportement vu en unitaire puis en integration.

## Criteres d'evaluation

- pertinence des scenarios choisis ;
- capacite a tester la collaboration entre objets ;
- progression de l'application ;
- difference bien comprise entre tests unitaires et tests d'integration.
