# TP1 

## Enoncé

Lister moi tous les éléments dont vous allez avoir besoin dans le **code métier** pour la réalisation de ce projet.
- classes
- méthodes
- interfaces
- abstractions
- attributs
- etc...

## Elements

- Classes
    - Commande => on part du principe qu'une nouvelle toutes les X secondes arrive. On part du principe que la commande existe tant que l'objet existe. Pas d'état. Quand elle est honorée, on détruit l'objet.
        - Numero
        - Client
        - Durée : si au bout de X secondes elle n'est pas honorée, le client part
        - Glaces[] : Liste des glaces de la commande
        - PrixGlobal()
        - LivrerCommande()
    - Client
        - Numero
        - Commandes
    - Stock
        - Glaces[Glace => quantité] : liste de glaces avec la quantité
    - Glace
        - Temps de fabrication => temps de conception, réalisation, livraison etc...
        - Type (cornet ou pot)
        - prix d'achat
        - prix de vente
        - date de péremption
        - Saveur
    - Saveur
        - nom
    - Caisse => pour encaisser et payer !
        - argent
        - décaisser()
        - encaisser()
    - Settings
        - montant de départ dans la caisse
        - température minimale


