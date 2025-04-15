<?php

namespace App\Models;

use Biostate\FilamentMenuBuilder\Traits\Menuable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Clan extends Model
{
    /** @use HasFactory<\Database\Factories\ClanFactory> */
    use HasFactory;

    use Menuable;

    protected $fillable = [
        "name",
        "game_id",
        "group_id",
        "slug",
        "active"
    ];

    public function game() : BelongsTo {
        return $this->belongsTo(Game::class);
    }

    public function getMenuLinkAttribute(): string
    {
        return route("clan.overview.specific", [
            'game' => $this->game->slug,
            'slug' => $this->slug
        ]);
    }

    public function getMenuItemNameAttribute(): string {
        return $this->name;
    }
}
