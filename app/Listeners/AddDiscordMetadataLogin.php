<?php

namespace App\Listeners;

use App\Models\UserPlatform;
use Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddDiscordMetadataLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $userId = $event->user->id;
        $platforms = UserPlatform::select()->where('user_id', $userId)->get();
        $data = array();
        foreach ($platforms as $entry) {
            $data[$entry->platform] = json_decode($entry['metadata'], true);
        }
        session(['metadata' => $data]);

    }
}
