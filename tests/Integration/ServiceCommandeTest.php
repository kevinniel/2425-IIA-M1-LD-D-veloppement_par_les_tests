<?php

declare(strict_types=1);

namespace Tests\Integration;

use App\Caisse;
use App\Commande;
use App\Glace;
use App\ServiceCommande;
use App\Stock;
use PHPUnit\Framework\TestCase;

final class ServiceCommandeTest extends TestCase
{
    public function testItUpdatesStockCashRegisterAndOrderWhenAccepted(): void
    {
        $commande = new Commande();
        $commande->ajouterGlace(new Glace('vanille', 'vanille', 'pot', 4));
        $commande->ajouterGlace(new Glace('chocolat', 'chocolat', 'cornet', 4));

        $stock = new Stock();
        $stock->ajouter('vanille', 2);
        $stock->ajouter('chocolat', 1);

        $caisse = new Caisse();
        $service = new ServiceCommande();

        $resultat = $service->traiter($commande, $stock, $caisse);

        self::assertTrue($resultat->succesExecution());
        self::assertSame('Commande acceptee.', $resultat->message());
        self::assertTrue($commande->estLivree());
        self::assertSame(1, $stock->quantiteDe('vanille'));
        self::assertSame(0, $stock->quantiteDe('chocolat'));
        self::assertSame(8, $caisse->montant());
    }

    public function testItRefusesTheOrderWhenStockIsMissing(): void
    {
        $commande = new Commande();
        $commande->ajouterGlace(new Glace('vanille', 'vanille', 'pot', 4));
        $commande->ajouterGlace(new Glace('vanille', 'vanille', 'pot', 4));

        $stock = new Stock();
        $stock->ajouter('vanille', 1);

        $caisse = new Caisse();
        $service = new ServiceCommande();

        $resultat = $service->traiter($commande, $stock, $caisse);

        self::assertFalse($resultat->succesExecution());
        self::assertSame('Commande refusee: stock insuffisant.', $resultat->message());
        self::assertFalse($commande->estLivree());
        self::assertSame(1, $stock->quantiteDe('vanille'));
        self::assertSame(0, $caisse->montant());
    }
}
