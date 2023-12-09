<?php

namespace Hup234design\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\Cms\Models\Page;
use Hup234design\Cms\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index() : View
    {
        $page = Page::indexPages()->whereSlug('posts')->firstOrFail();

        $posts = Post::visible()->orderBy('publish_at', 'desc')->paginate();

        return view('posts', [
            'page'  => $page,
            'posts' => $posts,
        ]);
    }

    public function post($slug) : View
    {
        $page = Post::visible()->whereSlug($slug)->firstOrFail();

        return view('post', [
            'page' => $page
        ]);
    }
}
