<?php

namespace Hup234design\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\Cms\Models\Page;
use Hup234design\Cms\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index() : View
    {
        $page = Page::indexPages()->whereSlug('projects')->firstOrFail();

        $projects = Project::visible()->get();

        return view('projects', [
            'page'  => $page,
            'projects' => $projects,
        ]);
    }

    public function project($slug) : View
    {
        $project = Project::visible()->whereSlug($slug)->firstOrFail();

        return view('project', [
            'page' => $project
        ]);
    }
}
