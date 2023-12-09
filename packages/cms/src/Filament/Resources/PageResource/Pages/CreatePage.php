<?php

namespace Hup234design\Cms\Filament\Resources\PageResource\Pages;

use Hup234design\Cms\Filament\Resources\PageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = 'page';
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            //PreviewAction::make(),
        ];
    }

}
