<?php declare(strict_types=1);

namespace App\Lib\Auth;

class DiscordAuthResult {
    public array $raw;

    public function __construct(array $raw)
    {
        $this->raw = $raw;
    }

    public function handle() : string {
        return $this->raw['discordHandle'] ?? '';
    }

    public function id() : string {
        return $this->raw['id'] ?? '';
    }

    public function inNetworkServer() : bool {
        return $this->raw['inServer'] ?? false;
    }

    public function isNetworkAdmin() : bool {
        return $this->raw['isAdmin'] ?? false;
    }

    public function isNetworkModerator() : bool {
        return $this->raw['isModerator'] ?? false;
    }

    /**
     * @return string[]
     */
    public function nickNames() : array {
        return $this->raw['nicknames'] ?? [];
    }

    public function globalName() : string {
        return $this->raw['globalName'] ?? '';
    }

    public function isNetworkBooster() : bool {
        return $this->raw['isBooster'] ?? false;
    }

    public function isNetworkRetired() : bool {
        return $this->raw['isRetired'] ?? false;
    }

    public function redirect(): string {
        return $this->raw['userRedirect'] ?? '';
    }
}
