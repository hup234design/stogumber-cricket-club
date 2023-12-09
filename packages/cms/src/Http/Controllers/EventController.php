<?php

namespace Hup234design\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\Cms\Models\Event;
use Hup234design\Cms\Models\Page;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index() : View
    {
        $page = Page::indexPages()->whereSlug('events')->firstOrFail();

        $events = Event::upcoming()->visible()->orderBy('date', 'asc')->get();

        return view('events', [
            'page'  => $page,
            'events' => $events,
        ]);
    }

    public function event($slug) : View
    {
        $page = Event::visible()->whereSlug($slug)->firstOrFail();

        return view('event', [
            'page' => $page
        ]);
    }
}
