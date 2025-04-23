<?php

namespace App\Lib\Rasputin;

use Illuminate\Http\Client\ConnectionException;

class RasputinMember
{
    private string $id;
    private array $responses;

    public function __construct(string $id = '') {
        $this->id = $id;
        $this->responses = [];
    }

    /**
     * @throws ConnectionException
     */
    public function titles() {
        if(!isset($this->responses['titles'])) {
            $response = \Http::asJson()
                ->withUrlParameters([
                    'server' => config('services.levelcrush.rasputin.server'),
                    'member' => $this->id,
                ])
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'X-API-KEY' => config('services.levelcrush.rasputin.secret'),
                ])
                ->withUserAgent(config('services.levelcrush.rasputin.agent'))
                ->get('{+server}/member/{member}/titles');

            $data = json_decode($response->body(), true);
            $this->responses['titles'] = $data;
        }
        return $this->responses['titles'];

    }
}
