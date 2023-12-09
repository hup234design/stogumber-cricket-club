<?php

use Illuminate\Support\Facades\Route;

use Hup234design\Cms\Http\Controllers\EventController;
use Hup234design\Cms\Http\Controllers\PageController;
use Hup234design\Cms\Http\Controllers\PostController;
use Hup234design\Cms\Http\Controllers\ProjectController;
use Hup234design\Cms\Http\Controllers\ServiceController;

Route::middleware(['web'])->group(function () {

    Route::prefix(cms('posts_slug') ?? 'posts')->group(function () {
        Route::get('/{slug}', [PostController::class, 'post'])->name('post');
        Route::get('/', [PostController::class, 'index'])->name('posts');
    });

    if( cms('events_enabled') ) {
        Route::prefix(cms('events_slug') ?? 'events')->group(function () {
            Route::get('/{slug}', [EventController::class, 'event'])->name('event');
            Route::get('/', [EventController::class, 'index'])->name('events');
        });
    }

    if( cms('services_enabled') ) {
        Route::prefix(cms('services_slug') ?? 'services')->group(function () {
            Route::get('/{slug}', [ServiceController::class, 'service'])->name('service');
            Route::get('/', [ServiceController::class, 'index'])->name('services');
        });
    }

    if( cms('projects_enabled') ) {
        Route::prefix(cms('projects_slug') ?? 'projects')->group(function () {
            Route::get('/{slug}', [ProjectController::class, 'project'])->name('project');
            Route::get('/', [ProjectController::class, 'index'])->name('projects');
        });
    }

    Route::get('/{slug}', [PageController::class, 'page'])->name('page');
    Route::get('/', [PageController::class, 'home'])->name('home');

});
