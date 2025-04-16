<?php

namespace App\Providers;

use Laravel\Socialite\Two\AbstractProvider;

class LevelCrushAuthProvider extends AbstractProvider
{

    /**
     * @inheritDoc
     */
    protected function getAuthUrl($state)
    {
        // TODO: Implement getAuthUrl() method.
    }

    /**
     * @inheritDoc
     */
    protected function getTokenUrl()
    {
        // TODO: Implement getTokenUrl() method.
    }

    /**
     * @inheritDoc
     */
    protected function getUserByToken($token)
    {
        // TODO: Implement getUserByToken() method.
    }

    /**
     * @inheritDoc
     */
    protected function mapUserToObject(array $user)
    {
        // TODO: Implement mapUserToObject() method.
    }
}
