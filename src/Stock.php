<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;
use LogicException;

final class Stock
{
    /** @var array<string, int> */
    private array $quantites = [];

    public function ajouter(string $identifiant, int $quantite): void
    {
        if ($identifiant === '') {
            throw new InvalidArgumentException('L identifiant est obligatoire.');
        }

        if ($quantite <= 0) {
            throw new InvalidArgumentException('La quantite doit etre positive.');
        }

        $this->quantites[$identifiant] = $this->quantites[$identifiant] ?? 0;
        $this->quantites[$identifiant] += $quantite;
    }

    public function quantiteDe(string $identifiant): int
    {
        return $this->quantites[$identifiant] ?? 0;
    }

    public function peutServir(Commande $commande): bool
    {
        $demandes = [];

        foreach ($commande->glaces() as $glace) {
            $identifiant = $glace->identifiant();
            $demandes[$identifiant] = ($demandes[$identifiant] ?? 0) + 1;
        }

        foreach ($demandes as $identifiant => $quantiteDemandee) {
            if ($this->quantiteDe($identifiant) < $quantiteDemandee) {
                return false;
            }
        }

        return true;
    }

    public function retirerPour(Commande $commande): void
    {
        if (! $this->peutServir($commande)) {
            throw new LogicException('Stock insuffisant pour cette commande.');
        }

        foreach ($commande->glaces() as $glace) {
            $identifiant = $glace->identifiant();
            $this->quantites[$identifiant] -= 1;
        }
    }

    /**
     * @return array<string, int>
     */
    public function toutesLesQuantites(): array
    {
        return $this->quantites;
    }
}
