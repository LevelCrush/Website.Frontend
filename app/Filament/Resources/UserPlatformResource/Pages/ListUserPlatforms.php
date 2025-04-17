<?php

namespace App\Filament\Resources\UserPlatformResource\Pages;

use App\Filament\Resources\UserPlatformResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserPlatforms extends ListRecords
{
    protected static string $resource = UserPlatformResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
