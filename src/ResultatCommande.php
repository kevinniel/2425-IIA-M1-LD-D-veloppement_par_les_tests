<?php

declare(strict_types=1);

namespace App;

final class ResultatCommande
{
    private function __construct(
        private bool $succes,
        private string $message
    ) {
    }

    public static function succes(string $message): self
    {
        return new self(true, $message);
    }

    public static function refus(string $message): self
    {
        return new self(false, $message);
    }

    public function succesExecution(): bool
    {
        return $this->succes;
    }

    public function message(): string
    {
        return $this->message;
    }
}
