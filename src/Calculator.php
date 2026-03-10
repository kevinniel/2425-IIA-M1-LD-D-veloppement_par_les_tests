<?php

namespace App;

final class Calculator
{
    public function add(int $left, int $right): int
    {
        return $left + $right;
    }
    
    // Si on veut ajouter une nouvelle fonction pour additionner 2 float : on en crée une nouvelle, on ne modifie pas l'existente !
    // public function addFloat(float $left, float $right): float
    // {
    //     return $left + $right;
    // }
}

// elle sert à enregistrer des choses en BDD
// Un jour (dans 3 ans) un dev arrive, et il faut enregistrer un nombre à virgule
// on change tous les int en float

// est-ce que l'ancien code fonctionne toujours ?