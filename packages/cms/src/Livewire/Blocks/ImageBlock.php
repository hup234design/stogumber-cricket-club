<?php

namespace Hup234design\Cms\Livewire\Blocks;

use Filament\Forms;
use FilamentTiptapEditor\TiptapEditor;
use Hup234design\Cms\Filament\Forms\Components\MediaImagePicker;
use Hup234design\Cms\Filament\Services\FormComponents;
use Hup234design\Cms\Filament\Support\ContentBlock;
use Hup234design\Cms\Models\MediaImage;
use Illuminate\Contracts\View\View;

class ImageBlock extends ContentBlock
{
    public static function block() {
        return Forms\Components\Builder\Block::make('image-block')
            ->label('Image')
            ->icon('heroicon-o-photo')
            ->schema(
                FormComponents::contentBlock(
                    [
                        MediaImagePicker::make('media_image_id')
                            ->required(),
                    ]
                )
            );
    }

    public function render(): View
    {
        return view('cms::livewire.blocks.image-block');
    }
}
