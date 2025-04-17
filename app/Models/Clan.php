<?php

namespace App\Models;

use Biostate\FilamentMenuBuilder\Traits\Menuable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * 
 *
 * @property int $id
 * @property int $game_id
 * @property string $group_id
 * @property string $name
 * @property string $slug
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Game $game
 * @property-read string $menu_item_name
 * @property-read string $menu_link
 * @property-read string $menu_name
 * @method static \Database\Factories\ClanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan filamentSearch($search, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
