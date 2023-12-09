<?php

namespace Hup234design\Cms\Filament\Forms\Components;

use Filament\Forms\Components\Component;

class MediaImageLayout extends Component
{
    protected string $view = 'cms::filament.forms.components.media-image-layout';

    public static function make(): static
    {
        return app(static::class);
    }
}
