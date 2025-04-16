<?php declare(strict_types=1);

namespace App\Lib\Auth;

enum AuthPlatform
{
    case Discord;
    case Bungie;

    public function asString(): string {
        return match($this) {
            AuthPlatform::Bungie => 'bungie',
            AuthPlatform::Discord => 'discord'
        };
    }
}
