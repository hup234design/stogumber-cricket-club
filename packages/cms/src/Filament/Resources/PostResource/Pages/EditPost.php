<?php

namespace Hup234design\Cms\Filament\Resources\PostResource\Pages;

use Hup234design\Cms\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

class EditPost extends EditRecord
{
    use HasPreviewModal;

    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            PreviewAction::make(),
        ];
    }

    protected function getPreviewModalView(): ?string
    {
        return 'cms.post';
    }

    protected function getPreviewModalDataRecordKey(): ?string
    {
        return 'post';
    }
}
