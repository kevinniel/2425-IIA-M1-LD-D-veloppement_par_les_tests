# TP5

## Titre

Tests end-to-end sur une version jouable de l'application

## Objectifs

- terminer une premiere version complete de l'application ;
- tester le systeme depuis un vrai point d'entree ;
- verifier un parcours utilisateur de bout en bout ;
- faire le lien entre toutes les couches deja codees.

## Contexte

Vous avez deja :

- des classes metier testees unitairement ;
- plusieurs scenarios d'integration ;
- une partie significative de l'application en place.

Le but final est maintenant d'obtenir une application executable et testee de bout en bout.

## Travail demande

Choisissez un vrai point d'entree de votre application, puis ecrivez des tests e2e pour verifier qu'un utilisateur peut realiser les parcours les plus importants.

Points d'entree possibles :

- un script PHP lance en ligne de commande ;
- une facade applicative ;
- un petit point d'entree HTTP si vous en avez cree un.

## Attendus minimum

- un point d'entree utilisable ;
- au moins 2 tests end-to-end ;
- des scenarios representatifs du fonctionnement global ;
- une application qui tourne vraiment.

## Pistes de scenarios

- passer une commande valide ;
- refuser une commande si le stock manque ;
- enchainer plusieurs commandes ;
- verifier l'etat final du stock ;
- verifier l'etat final de la caisse ;
- verifier qu'un client obtient une reponse exploitable.

## Contraintes

- partir d'un vrai point d'entree ;
- traverser plusieurs couches de l'application ;
- verifier un resultat visible ;
- garder peu de tests e2e, mais des tests utiles.
- avant d'ecrire un nouveau test e2e, faire un commit de l'etat courant ;
- juste apres avoir redige le test, faire un second commit pour prouver la demarche TDD.
- convention demandee pour les messages de commit : `tests done: ...` puis `code done: ...`.

## Livrables

- les tests end-to-end ;
- le point d'entree choisi ;
- le code final necessaire pour faire tourner l'application ;
- un historique Git montrant au moins, pour plusieurs parcours, un commit avant le test puis un commit apres redaction du test ;
- une courte note expliquant :
  quels parcours utilisateur vous avez consideres comme essentiels.

## Bonus

- ajouter un troisieme scenario e2e ;
- comparer un meme cas en unitaire, integration et e2e ;
- ameliorer l'organisation du projet avant la fin du TP.

## Criteres d'evaluation

- pertinence du point d'entree ;
- qualite des parcours choisis ;
- coherence entre les differentes couches de l'application ;
- capacite a livrer une version complete et executable.
