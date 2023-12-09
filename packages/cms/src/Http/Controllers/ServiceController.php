<?php

namespace Hup234design\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\Cms\Models\Page;
use Hup234design\Cms\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index() : View
    {
        $page = Page::indexPages()->whereSlug('services')->firstOrFail();

        $services = Service::visible()->get();

        return view('services', [
            'page'  => $page,
            'services' => $services,
        ]);
    }

    public function service($slug) : View
    {
        $service = Service::visible()->whereSlug($slug)->firstOrFail();

        return view('service', [
            'page' => $service
        ]);
    }
}
