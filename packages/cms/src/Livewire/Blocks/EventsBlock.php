<?php

namespace Hup234design\Cms\Livewire\Blocks;

use Filament\Forms;
use FilamentTiptapEditor\TiptapEditor;
use Hup234design\Cms\Filament\Services\FormComponents;
use Hup234design\Cms\Filament\Support\ContentBlock;
use Hup234design\Cms\Models\Event;
use Illuminate\Contracts\View\View;

class EventsBlock extends ContentBlock
{
    public static function block() {
        return Forms\Components\Builder\Block::make('events-block')
            ->label('Events')
            ->icon('heroicon-o-calendar-days')
            ->schema(
                FormComponents::contentBlock(
                    [
                        //
                    ]
                )
            );
    }

    public function render(): View
    {
        return view('cms::livewire.blocks.events-block', [
            'events' => Event::upcoming()->visible()->orderBy('date', 'asc')->take(3)->get(),
        ]);
    }
}
