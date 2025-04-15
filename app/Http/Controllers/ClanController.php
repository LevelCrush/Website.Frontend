<?php

namespace App\Http\Controllers;

use App\Models\Clan;
use App\Models\Game;
use App\Http\Requests\StoreClanRequest;
use App\Http\Requests\UpdateClanRequest;

class ClanController extends Controller
{
    public function showNetwork() {
        return view('pages.clan.network');
    }

    public function showSpecific(string $game, string $clan) {

        $game = Game::where('slug', $game)->first();
        if(!$game) {
            abort(404);
        }

        $clan = Clan::where('active', true)
            ->where('slug', $clan)
            ->where('game_id', $game->id)
            ->first();

        if(!$clan) {
            abort(404);
        }

        $url = sprintf("https://www.bungie.net/en/ClanV2?groupid=%s",rawurlencode($clan->group_id));
        return redirect($url, 307);
    }
}
