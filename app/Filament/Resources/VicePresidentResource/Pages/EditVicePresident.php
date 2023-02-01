<?php

namespace App\Filament\Resources\VicePresidentResource\Pages;

use App\Filament\Resources\VicePresidentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVicePresident extends EditRecord
{
    protected static string $resource = VicePresidentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
