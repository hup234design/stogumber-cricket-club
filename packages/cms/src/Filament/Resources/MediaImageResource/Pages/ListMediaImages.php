<?php

namespace Hup234design\Cms\Filament\Resources\MediaImageResource\Pages;

use Hup234design\Cms\Filament\Resources\MediaImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMediaImages extends ListRecords
{
    protected static string $resource = MediaImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Upload Images')
                ->icon('heroicon-o-arrow-up-on-square-stack'),
        ];
    }
}
