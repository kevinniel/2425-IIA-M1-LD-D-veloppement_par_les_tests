<?php

namespace App;

interface Addition {
    public function add();
}

class Calculator implements Addition
{
    private function add(int $left, int $right): int
    {
        return $left + $right;
    }
}

class CalculatorBis implements Addition
{

    private function add(int $left, int $middle, int $right): int
    {
        return $left + $middle + $right;
    }
}


class Test {

    public int $a = 1;
    public int $b = 2;
    public int $c = 3;

    private Calculator $calculator;

    public function toto() {
        // ici je veux faire un calcul "add" sur mes paramètres
        $this->calculator->add($a, $b, $c);
    }

}


