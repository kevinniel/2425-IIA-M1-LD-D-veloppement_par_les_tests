<?php

declare(strict_types=1);

use App\GlacierApplication;

require dirname(__DIR__) . '/vendor/autoload.php';

if ($argc < 2) {
    fwrite(STDERR, "Usage: php bin/glacier.php vanille,chocolat [vanille]\n");
    exit(1);
}

$commandes = [];

foreach (array_slice($argv, 1) as $argument) {
    $saveurs = array_values(array_filter(array_map('trim', explode(',', $argument)), static fn (string $saveur): bool => $saveur !== ''));
    $commandes[] = $saveurs;
}

$rapport = GlacierApplication::demo()->traiterScenario($commandes);

echo json_encode($rapport, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
