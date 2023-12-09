<?php

namespace Hup234design\Cms\Livewire\Blocks;

use Filament\Forms;
use Hup234design\Cms\Filament\Support\ContentBlock;
use Illuminate\Contracts\View\View;

class CtaBlock extends ContentBlock
{
    public static function block() {
        return Forms\Components\Builder\Block::make('cta-block')
            ->icon('heroicon-o-arrow-top-right-on-square')
            ->schema([
                ...self::defaultSchema(),
            ]);
    }

    public function render(): View
    {
        return view('cms::livewire.blocks.cta-block');
    }
}
