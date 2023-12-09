<?php

namespace Hup234design\Cms\Filament\Resources\EventResource\Pages;

use Hup234design\Cms\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Hup234design\Cms\Filament\Resources\PageResource;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

class EditEvent extends EditRecord
{
    use HasPreviewModal;

    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            PreviewAction::make(),
        ];
    }

    protected function getPreviewModalView(): ?string
    {
        return 'cms.event';
    }

    protected function getPreviewModalDataRecordKey(): ?string
    {
        return 'event';
    }

}
