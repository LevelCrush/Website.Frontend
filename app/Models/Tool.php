<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $game_id
 * @property string $name
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ToolFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tool whereUrl($value)
 * @mixin \Eloquent
 */
class Tool extends Model
{
    /** @use HasFactory<\Database\Factories\ToolFactory> */
    use HasFactory;
}
