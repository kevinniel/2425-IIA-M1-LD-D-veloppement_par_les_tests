# TP3

## Titre

TDD et tests unitaires du coeur metier

## Objectifs

- commencer a coder l'application pour de vrai ;
- pratiquer le cycle `Red / Green / Refactor` ;
- identifier ce qui peut etre teste en isolation ;
- produire une premiere base metier solide.

## Contexte

Jusqu'ici, vous avez surtout modelise le domaine et liste les regles.

Le but maintenant est de commencer l'implementation de l'application en partant du coeur metier, avec des tests unitaires sur plusieurs classes et pas seulement sur `Glace`.

## Travail demande

Vous devez choisir les classes metier a implementer en priorite et ecrire leurs tests unitaires avant le code.

Classes possibles :

- `Glace`
- `Saveur`
- `Commande`
- `Client`
- `Stock`
- `Caisse`
- `Settings`

Vous n'etes pas obliges de tout terminer, mais vous devez faire des choix coherents pour faire avancer l'application.

## Attendus minimum

- au moins 3 classes metier codees ;
- des tests unitaires sur chacune de ces classes ;
- les principales regles metier verifiees par des tests ;
- une suite de tests verte.

## Pistes de travail

Exemples de points a tester selon les classes choisies :

- validite des donnees d'une `Glace` ;
- calcul du prix total d'une `Commande` ;
- ajout ou retrait d'elements dans un `Stock` ;
- encaissement et decaissement dans une `Caisse` ;
- lien entre un `Client` et ses commandes ;
- regles de configuration dans `Settings`.

## Contraintes

- ecrire les tests avant le code de production ;
- faire de petits tests lisibles ;
- une regle principale par test ;
- rester sur des tests vraiment unitaires ;
- nommer clairement les cas verifies.
- avant d'ecrire un nouveau test, faire un commit de l'etat courant ;
- juste apres avoir redige le test, faire un second commit pour prouver la demarche TDD.
- convention demandee pour les messages de commit : `tests done: ...` puis `code done: ...`.

## Livrables

- les nouvelles classes metier dans `src/` ;
- les tests unitaires dans `tests/Unit/` ;
- un historique Git montrant au moins, pour plusieurs cas, un commit avant le test puis un commit apres redaction du test ;
- une courte note expliquant :
  quelles classes vous avez choisies en premier, et pourquoi.

## Bonus

- ajouter une ou deux classes supplementaires ;
- factoriser les jeux de donnees repetes ;
- ameliorer la lisibilite des tests avec des methodes de preparation.

## Criteres d'evaluation

- pertinence des choix de classes ;
- qualite du decoupage des tests ;
- respect du TDD ;
- progression reelle vers une application complete.
