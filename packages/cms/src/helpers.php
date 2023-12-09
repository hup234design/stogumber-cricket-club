<?php

use Illuminate\Support\Facades\View;

// helpers.php

if (!function_exists('cms')) {
    function cms($key = null, $default = null)
    {
        if ($key === null) {
            return app(\Hup234design\Cms\Filament\Support\CmsSettings::class);
        }
        return app(\Hup234design\Cms\Filament\Support\CmsSettings::class)->get($key, $default);
    }
}
