<?php

namespace App\Filament\Resources\ClubOfficerResource\Pages;

use App\Filament\Resources\ClubOfficerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClubOfficer extends EditRecord
{
    protected static string $resource = ClubOfficerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
