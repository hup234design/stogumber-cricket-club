<?php

namespace Hup234design\Cms\Livewire\Blocks;

use Filament\Forms;
use FilamentTiptapEditor\TiptapEditor;
use Hup234design\Cms\Filament\Services\FormComponents;
use Hup234design\Cms\Filament\Support\ContentBlock;
use Illuminate\Contracts\View\View;

class RichTextBlock extends ContentBlock
{
    public static function block() {

        return Forms\Components\Builder\Block::make('rich-text-block')
            ->label('Rich Text')
            ->icon('heroicon-o-document-text')
            ->schema(
                FormComponents::contentBlock(
                    [
                        TiptapEditor::make('content')
                            ->profile('simple')
                            ->required()
                            ->columnSpan(fn (Forms\Get $get) => $get('columns') ? 1 : 2),
                    ]
                )
            );
    }

    public function render(): View
    {
        return view('cms::livewire.blocks.rich-text-block');
    }
}
