<?php

namespace App\Filament\Resources\UserPlatformResource\Pages;

use App\Filament\Resources\UserPlatformResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserPlatform extends EditRecord
{
    protected static string $resource = UserPlatformResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
