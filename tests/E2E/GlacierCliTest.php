<?php

declare(strict_types=1);

namespace Tests\E2E;

use PHPUnit\Framework\TestCase;

final class GlacierCliTest extends TestCase
{
    public function testItProcessesAValidCliOrder(): void
    {
        $payload = $this->executerCli('vanille,chocolat');

        self::assertTrue($payload['commandes'][0]['succes']);
        self::assertSame('Commande acceptee.', $payload['commandes'][0]['message']);
        self::assertSame(8, $payload['caisse']);
        self::assertSame(1, $payload['stock']['vanille']);
        self::assertSame(0, $payload['stock']['chocolat']);
    }

    public function testItKeepsAConsistentStateAcrossSeveralCliOrders(): void
    {
        $payload = $this->executerCli('vanille', 'vanille', 'vanille');

        self::assertTrue($payload['commandes'][0]['succes']);
        self::assertTrue($payload['commandes'][1]['succes']);
        self::assertFalse($payload['commandes'][2]['succes']);
        self::assertSame('Commande refusee: stock insuffisant.', $payload['commandes'][2]['message']);
        self::assertSame(8, $payload['caisse']);
        self::assertSame(0, $payload['stock']['vanille']);
    }

    /**
     * @return array{
     *     commandes: list<array{succes: bool, message: string, prix_total: int}>,
     *     caisse: int,
     *     stock: array<string, int>
     * }
     */
    private function executerCli(string ...$arguments): array
    {
        $commande = escapeshellarg(PHP_BINARY)
            . ' '
            . escapeshellarg(dirname(__DIR__, 2) . '/bin/glacier.php');

        foreach ($arguments as $argument) {
            $commande .= ' ' . escapeshellarg($argument);
        }

        $output = [];
        $exitCode = 0;
        exec($commande, $output, $exitCode);

        self::assertSame(0, $exitCode, 'Le script CLI doit se terminer correctement.');

        /** @var array{
         *     commandes: list<array{succes: bool, message: string, prix_total: int}>,
         *     caisse: int,
         *     stock: array<string, int>
         * } $payload
         */
        $payload = json_decode(implode("\n", $output), true, 512, JSON_THROW_ON_ERROR);

        return $payload;
    }
}
