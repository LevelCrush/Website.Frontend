<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'levelcrush' => [
        'rasputin' => [
            'server' => env('RASPUTIN_SERVER', 'https://rasputin.levelcrush.com'),
            'secret' => env('RASPUTIN_SECRET', 'idkijustvibehere'),
            'agent' => env('RASPUTIN_AGENT', ''),
            'test' => [
                'membership' => env('RASPUTIN_TEST_MEMBERSHIP', 'placeholder'),
                'bungie_name' => env('RASPUTIN_TEST_BUNGIE_NAME', ''),
            ]
        ],
        'auth' => [
            'server' => env('AUTH_SERVER', 'http://localhost:6969'),
            'secret' => env('AUTH_SECRET','idkijustworkhere'),
            'agent' => env('AUTH_AGENT',''),
            'discord' => [
                'secret' => env('AUTH_SERVER_DISCORD_SECRET', 'placeholderDiscordSecret'),
                'enabled' => env('AUTH_SERVER_DISCORD',false)
            ],
            'bungie' => [
                'secret' => env('AUTH_SERVER_BUNGIE_SECRET','placeholderBungieSecret'),
                'enabled' => env('AUTH_SERVER_BUNGIE', false)
            ]
        ]
    ]

];
