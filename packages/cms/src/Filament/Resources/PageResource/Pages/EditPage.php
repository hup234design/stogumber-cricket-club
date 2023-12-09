<?php

namespace Hup234design\Cms\Filament\Resources\PageResource\Pages;

//use Filament\Forms\Components\Builder;
//use Filament\Forms\Components\Component;
use Hup234design\Cms\Filament\Resources\PageResource;
//use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
//use Hup234design\Cms\Livewire\Blocks\ContactBlock;
//use Hup234design\Cms\Livewire\Blocks\CtaBlock;
//use Hup234design\Cms\Livewire\Blocks\EventsBlock;
//use Hup234design\Cms\Livewire\Blocks\FeaturesBlock;
//use Hup234design\Cms\Livewire\Blocks\GalleryBlock;
//use Hup234design\Cms\Livewire\Blocks\ImageBlock;
//use Hup234design\Cms\Livewire\Blocks\PostsBlock;
//use Hup234design\Cms\Livewire\Blocks\RichTextBlock;
//use Hup234design\Cms\Livewire\Blocks\SliderBlock;
//use Hup234design\Cms\Livewire\Blocks\TestimonialsBlock;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
//use Pboivin\FilamentPeek\Pages\Concerns\HasBuilderPreview;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

class EditPage extends EditRecord
{
    use HasPreviewModal;

    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //PreviewAction::make(),
        ];
    }


//    protected function getPreviewModalView(): ?string
//    {
//        return 'page';
//    }
//
//    protected function getPreviewModalDataRecordKey(): ?string
//    {
//        return 'page';
//    }

}
