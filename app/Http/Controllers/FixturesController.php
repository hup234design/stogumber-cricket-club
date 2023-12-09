<?php

namespace App\Http\Controllers;

use Hup234design\Cms\Models\Page;
use Illuminate\View\View;

class FixturesController extends Controller
{
    public function index() : View
    {
        $page = Page::indexPages()->whereSlug('fixtures')->firstOrFail();

        return view('fixtures.index', [
            'page' => $page
        ]);
    }
}
