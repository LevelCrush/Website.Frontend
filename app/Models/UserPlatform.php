<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPlatform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPlatform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserPlatform query()
 * @mixin \Eloquent
 */
class UserPlatform extends Model
{
    protected $fillable = [
        'platform',
        'user_id',
        'entity_id',
        'email',
        'metadata'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
