<?php

declare(strict_types=1);

namespace App;

final class GlacierApplication
{
    /**
     * @param array<string, Glace> $menu
     */
    public function __construct(
        private array $menu,
        private Stock $stock,
        private Caisse $caisse,
        private ServiceCommande $serviceCommande
    ) {
    }

    public static function demo(): self
    {
        $menu = [
            'vanille' => new Glace('vanille', 'vanille', 'pot', 4),
            'chocolat' => new Glace('chocolat', 'chocolat', 'cornet', 4),
        ];

        $stock = new Stock();
        $stock->ajouter('vanille', 2);
        $stock->ajouter('chocolat', 1);

        return new self($menu, $stock, new Caisse(), new ServiceCommande());
    }

    /**
     * @param list<list<string>> $commandesDeSaveurs
     * @return array{
     *     commandes: list<array{succes: bool, message: string, prix_total: int}>,
     *     caisse: int,
     *     stock: array<string, int>
     * }
     */
    public function traiterScenario(array $commandesDeSaveurs): array
    {
        $resultats = [];

        foreach ($commandesDeSaveurs as $saveurs) {
            $commande = new Commande();

            foreach ($saveurs as $saveur) {
                if (! isset($this->menu[$saveur])) {
                    $resultats[] = [
                        'succes' => false,
                        'message' => sprintf('Commande refusee: glace inconnue "%s".', $saveur),
                        'prix_total' => 0,
                    ];

                    continue 2;
                }

                $commande->ajouterGlace($this->menu[$saveur]);
            }

            $resultat = $this->serviceCommande->traiter($commande, $this->stock, $this->caisse);

            $resultats[] = [
                'succes' => $resultat->succesExecution(),
                'message' => $resultat->message(),
                'prix_total' => $commande->prixTotal(),
            ];
        }

        return [
            'commandes' => $resultats,
            'caisse' => $this->caisse->montant(),
            'stock' => $this->stock->toutesLesQuantites(),
        ];
    }
}
