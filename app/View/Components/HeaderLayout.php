<?php

namespace App\View\Components;

use Closure;
use Hup234design\Cms\Models\Post;
use Hup234design\Cms\Services\NavigationMenuItems;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use RyanChandler\FilamentNavigation\Models\Navigation;

class HeaderLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu = Navigation::fromHandle('header');
        $menuLinks = NavigationMenuItems::transform($menu['items']);

        ray( $menu );
        ray( $menuLinks );

        return view('layouts.header', [
            'menuLinks' => $menuLinks
        ]);
    }
}
