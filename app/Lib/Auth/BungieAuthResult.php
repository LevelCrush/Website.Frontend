<?php

namespace App\Lib\Auth;

class BungieAuthResult
{
    public array $raw;

    public function __construct(array $raw) {
        $this->raw = $raw;
    }

    public function id(): string {
        return $this->raw['membershipId'] ?? '';
    }

    public function type(): int {
        return $this->raw['membershipType'] ?? -1;
    }

    public function displayName(): string {
        return $this->raw['displayName'] ?? '';
    }

    public function inNetworkClan() : bool {
        return $this->raw['inNetworkClan'] ?? false;
    }
}
