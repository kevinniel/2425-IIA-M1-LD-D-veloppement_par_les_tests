<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;

final class Glace
{
    public function __construct(
        private string $identifiant,
        private string $saveur,
        private string $contenant,
        private int $prixVente
    ) {
        if ($identifiant === '') {
            throw new InvalidArgumentException('L identifiant est obligatoire.');
        }

        if ($saveur === '') {
            throw new InvalidArgumentException('La saveur est obligatoire.');
        }

        if (! in_array($contenant, ['pot', 'cornet'], true)) {
            throw new InvalidArgumentException('Le contenant doit etre pot ou cornet.');
        }

        if ($prixVente <= 0) {
            throw new InvalidArgumentException('Le prix de vente doit etre positif.');
        }
    }

    public function identifiant(): string
    {
        return $this->identifiant;
    }

    public function saveur(): string
    {
        return $this->saveur;
    }

    public function contenant(): string
    {
        return $this->contenant;
    }

    public function prixVente(): int
    {
        return $this->prixVente;
    }
}
