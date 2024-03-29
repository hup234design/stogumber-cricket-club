<?php

namespace Hup234design\Cms\Filament\Resources\ServiceResource\Pages;

use Hup234design\Cms\Filament\Resources\PageResource;
use Hup234design\Cms\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

class CreateService extends CreateRecord
{
    use HasPreviewModal;

    protected static string $resource = ServiceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = 'service';
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            PreviewAction::make(),
        ];
    }

    protected function getPreviewModalView(): ?string
    {
        return 'cms.service';
    }

    protected function getPreviewModalDataRecordKey(): ?string
    {
        return 'service';
    }
}

