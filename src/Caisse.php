<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;

final class Caisse
{
    public function __construct(private int $montant = 0)
    {
        if ($montant < 0) {
            throw new InvalidArgumentException('Le montant initial ne peut pas etre negatif.');
        }
    }

    public function encaisser(int $montant): void
    {
        if ($montant <= 0) {
            throw new InvalidArgumentException('Le montant encaisse doit etre positif.');
        }

        $this->montant += $montant;
    }

    public function montant(): int
    {
        return $this->montant;
    }
}
