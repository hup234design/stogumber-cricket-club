<?php

namespace App\Livewire;

use App\Models\ClubOfficer;
use Filament\Forms;
use Hup234design\Cms\Filament\Support\ContentBlock;
use Hup234design\Cms\Filament\Support\ContentBlockSchema;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use function view;

class ClubOfficersBlock extends ContentBlock
{
    public static function block() {
        return Forms\Components\Builder\Block::make('club-officers-block')
            ->icon('heroicon-m-identification')
            ->schema([
                ...self::defaultSchema(),
            ]);
    }

    public function render(): View
    {
        return view('livewire.club-officers-block', [
            'club_officers' => ClubOfficer::all(),
        ]);
    }
}
