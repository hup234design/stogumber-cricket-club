<?php

namespace Hup234design\Cms\Filament\Resources\UserResource\Pages;

use Hup234design\Cms\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add User')
                ->icon('heroicon-m-user-plus')
                ->slideOver(),
        ];
    }
}
