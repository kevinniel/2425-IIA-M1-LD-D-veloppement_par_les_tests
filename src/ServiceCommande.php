<?php

declare(strict_types=1);

namespace App;

final class ServiceCommande
{
    public function traiter(Commande $commande, Stock $stock, Caisse $caisse): ResultatCommande
    {
        if ($commande->estVide()) {
            return ResultatCommande::refus('Commande refusee: la commande est vide.');
        }

        if (! $stock->peutServir($commande)) {
            return ResultatCommande::refus('Commande refusee: stock insuffisant.');
        }

        $stock->retirerPour($commande);
        $caisse->encaisser($commande->prixTotal());
        $commande->livrer();

        return ResultatCommande::succes('Commande acceptee.');
    }
}
