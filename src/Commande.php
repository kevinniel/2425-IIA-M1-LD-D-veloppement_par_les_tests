<?php

declare(strict_types=1);

namespace App;

use LogicException;

final class Commande
{
    /** @var list<Glace> */
    private array $glaces = [];

    private bool $livree = false;

    public function ajouterGlace(Glace $glace): void
    {
        if ($this->livree) {
            throw new LogicException('Une commande livree ne peut plus etre modifiee.');
        }

        $this->glaces[] = $glace;
    }

    /**
     * @return list<Glace>
     */
    public function glaces(): array
    {
        return $this->glaces;
    }

    public function prixTotal(): int
    {
        $total = 0;

        foreach ($this->glaces as $glace) {
            $total += $glace->prixVente();
        }

        return $total;
    }

    public function estVide(): bool
    {
        return $this->glaces === [];
    }

    public function estLivree(): bool
    {
        return $this->livree;
    }

    public function livrer(): void
    {
        if ($this->estVide()) {
            throw new LogicException('Une commande vide ne peut pas etre livree.');
        }

        if ($this->livree) {
            throw new LogicException('Une commande deja livree ne peut pas etre relivree.');
        }

        $this->livree = true;
    }
}
