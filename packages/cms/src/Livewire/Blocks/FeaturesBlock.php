<?php

namespace Hup234design\Cms\Livewire\Blocks;

use Filament\Forms;
use FilamentTiptapEditor\TiptapEditor;
use Hup234design\Cms\Filament\Forms\Components\IconPicker;
use Hup234design\Cms\Filament\Services\FormComponents;
use Hup234design\Cms\Filament\Support\ContentBlock;
use Hup234design\Cms\Models\Heroicon;
use Illuminate\Contracts\View\View;

class FeaturesBlock extends ContentBlock
{

    public static function block() {
        return Forms\Components\Builder\Block::make('features-block')
            ->label('Features')
            ->icon('heroicon-o-queue-list')
            ->schema(
                FormComponents::contentBlock(
                    [
                        Forms\Components\Repeater::make('features')
                            ->schema([
                                Forms\Components\Select::make('icon_style')
                                    ->options([
                                        "o" => "Outline",
                                        "s" => "Solid",
                                    ])
                                    ->required()
                                    ->default("o")
                                    ->placeholder(null),
                                Forms\Components\Select::make('icon')
                                    ->options(Heroicon::all()->pluck('name','name'))
                                    ->searchable(),
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(true),
                                Forms\Components\Textarea::make('text')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ])
                            ->columns(3)
                            ->collapsible()
                            ->collapsed(true)
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                    ]
                )
            );
    }

    public function render(): View
    {
        return view('cms::livewire.blocks.features-block');
    }
}
