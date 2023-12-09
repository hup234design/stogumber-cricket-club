<?php

namespace Hup234design\Cms\Livewire\Blocks;

use Filament\Forms;
use FilamentTiptapEditor\TiptapEditor;
use Hup234design\Cms\Filament\Services\FormComponents;
use Hup234design\Cms\Filament\Support\ContentBlock;
use Hup234design\Cms\Models\Post;
use Illuminate\Contracts\View\View;

class PostsBlock extends ContentBlock
{

    public static function block() {
        return Forms\Components\Builder\Block::make('posts-block')
            ->label('Latest Posts')
            ->icon('heroicon-o-newspaper')
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
        return view('cms::livewire.blocks.posts-block', [
            'posts' => Post::recent()->orderBy('publish_at', 'desc')->take(3)->get(),
        ]);
    }
}
