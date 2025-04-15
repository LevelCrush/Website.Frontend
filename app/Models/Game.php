<?php

namespace App\Models;

use Biostate\FilamentMenuBuilder\Traits\Menuable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    //
    use Menuable;
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "slug"
    ];

    public function clans() : HasMany {
        return $this->hasMany(Clan::class);
    }

    public function tools(): HasMany {
        return $this->hasMany(Tool::class);
    }


}
