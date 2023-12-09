<?php

namespace Hup234design\Cms\Filament\Resources\EventCategoryResource\Pages;

use Hup234design\Cms\Filament\Resources\EventCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventCategories extends ListRecords
{
    protected static string $resource = EventCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
