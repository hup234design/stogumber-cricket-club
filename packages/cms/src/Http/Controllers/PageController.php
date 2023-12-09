<?php

namespace Hup234design\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\Cms\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home() : View
    {
        $page = Page::pages()->where('home',true)->firstOrFail();

        return view('home', [
            'page' => $page
        ]);
    }

    public function page($slug) : View
    {
        $page = Page::pages()->visible()->where('home',false)->whereSlug($slug)->firstOrFail();

        return view('page', [
            'page' => $page
        ]);
    }
}
