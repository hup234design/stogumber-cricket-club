<?php

namespace Hup234design\Cms;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Hup234design\Cms\Commands\UpdateMediaImageConversions;
use Hup234design\Cms\Components\AppLayout;
use Hup234design\Cms\Components\EventsLayout;
use Hup234design\Cms\Components\FooterLayout;
use Hup234design\Cms\Components\HeaderLayout;
use Hup234design\Cms\Components\MediaImageRenderer;
use Hup234design\Cms\Components\PostsLayout;
use Hup234design\Cms\Components\ProjectsLayout;
use Hup234design\Cms\Components\ServicesLayout;
use Hup234design\Cms\Filament\Support\CmsSettings;
use Hup234design\Cms\Livewire\Blocks\ListBlock;
use Hup234design\Cms\Livewire\EnquiryForm;
use Hup234design\Cms\Livewire\MediaBrowser;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Hup234design\Cms\Commands\CmsCommand;
use Hup234design\Cms\Livewire\Blocks\ContactBlock;
use Hup234design\Cms\Livewire\Blocks\CtaBlock;
use Hup234design\Cms\Livewire\Blocks\RichTextBlock;
use Hup234design\Cms\Livewire\Blocks\EventsBlock;
use Hup234design\Cms\Livewire\Blocks\FeaturesBlock;
use Hup234design\Cms\Livewire\Blocks\ImageBlock;
use Hup234design\Cms\Livewire\Blocks\GalleryBlock;
use Hup234design\Cms\Livewire\Blocks\PostsBlock;
use Hup234design\Cms\Livewire\Blocks\SliderBlock;
use Hup234design\Cms\Livewire\Blocks\TestimonialsBlock;

class CmsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'cms';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
//            ->hasViewComponent('cms', AppLayout::class)
//            ->hasViewComponent('cms', HeaderLayout::class)
//            ->hasViewComponent('cms', FooterLayout::class)
//            ->hasViewComponent('cms', PostsLayout::class)
//            ->hasViewComponent('cms', EventsLayout::class)
//            ->hasViewComponent('cms', ServicesLayout::class)
//            ->hasViewComponent('cms', ProjectsLayout::class)
            ->hasViewComponent('cms', MediaImageRenderer::class)
//            ->hasMigrations([
//                'create_media_images_table',
//                'create_sliders_table',
//                'create_slides_table',
//                'create_post_categories_table',
//                'create_event_categories_table',
//                'create_pages_table',
//                'create_enquiries_table',
//                'create_service_categories_table',
//            ])
            ->hasCommand(UpdateMediaImageConversions::class)
            ->hasConfigFile('cms')
            ->hasViews('cms');
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

//        dd(__DIR__ . '/../resources/dist/css/cropper.min.css');

        FilamentAsset::register([
            Css::make('cropper', __DIR__ . '/../resources/dist/css/cropper.min.css'),
            Js::make('cropper', __DIR__ . '/../resources/dist/js/cropper.min.js'),
        ]);

        $this->loadMigrationsFrom([
            __DIR__ . '/../database/migrations',
        ]);

        $this->app->booted(function() {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });


        $this->publishes([

            __DIR__ . '/../stubs/app/View/Components/AppLayout.php.stub'    => app_path('View/Components/AppLayout.php'),
            __DIR__ . '/../stubs/app/View/Components/PostsLayout.php.stub'  => app_path('View/Components/PostsLayout.php'),
            __DIR__ . '/../stubs/app/View/Components/EventsLayout.php.stub' => app_path('View//Components/EventsLayout.php'),
            __DIR__ . '/../stubs/app/View/Components/HeaderLayout.php.stub' => app_path('View/Components/HeaderLayout.php'),
            __DIR__ . '/../stubs/app/View/Components/FooterLayout.php.stub' => app_path('View/Components/FooterLayout.php'),
            //__DIR__ . '/../stubs/app/View/Components/ServicesLayout.php'    => app_path('View/Components/ServicesLayout.php'),
            //__DIR__ . '/../stubs/app/View/Components/ProjectsLayout.php'    => app_path('View/Components/ProjectsLayout.php'),

            __DIR__ . '/../stubs/resources'      => resource_path('/'),

            __DIR__ . '/../resources/views/livewire/blocks' => resource_path('views/vendor/cms/livewire/blocks'),

            __DIR__ . '/../stubs/tailwind.config.js' => base_path('tailwind.config.js'),
            __DIR__ . '/../stubs/vite.config.js' => base_path('vite.config.js'),

//            __DIR__ . '/../stubs/resources/views/layouts/app.blade.php'      => resource_path('views/layouts/app.blade.php'),
//            __DIR__ . '/../stubs/resources/views/layouts/posts.blade.php'    => resource_path('views/layouts/posts.blade.php'),
//            __DIR__ . '/../stubs/resources/views/layouts/events.blade.php'   => resource_path('views/layouts/events.blade.php'),
//            __DIR__ . '/../stubs/resources/views/layouts/header.blade.php'   => resource_path('views/layouts/header.blade.php'),
//            __DIR__ . '/../stubs/resources/views/layouts/footer.blade.php'   => resource_path('views/layouts/footer.blade.php'),
//            //__DIR__ . '/../stubs/resources/views/layouts/services.blade.php' => resource_path('views/layouts/services.blade.php'),
//            //__DIR__ . '/../stubs/resources/views/layouts/projects.blade.php' => resource_path('views/layouts/projects.blade.php'),
//
//
//
//            __DIR__ . '/../stubs/resources/views/components/content-blocks.blade.php' => resource_path('views/components/content-blocks.blade.php'),
//            __DIR__ . '/../stubs/resources/views/components/page-content.blade.php'   => resource_path('views/components/page-content.blade.php'),
//            __DIR__ . '/../stubs/resources/views/components/slider.blade.php'         => resource_path('views/components/slider.blade.php'),
//
//            __DIR__ . '/../stubs/resources/views/home.blade.php'     => resource_path('views/home.blade.php'),
//            __DIR__ . '/../stubs/resources/views/page.blade.php'     => resource_path('views/page.blade.php'),
//            __DIR__ . '/../stubs/resources/views/posts.blade.php'    => resource_path('views/posts.blade.php'),
//            __DIR__ . '/../stubs/resources/views/post.blade.php'     => resource_path('views/post.blade.php'),
//            __DIR__ . '/../stubs/resources/views/events.blade.php'   => resource_path('views/events.blade.php'),
//            __DIR__ . '/../stubs/resources/views/event.blade.php'    => resource_path('views/event.blade.php'),
//            __DIR__ . '/../stubs/resources/views/services.blade.php' => resource_path('views/services.blade.php'),
//            __DIR__ . '/../stubs/resources/views/service.blade.php'  => resource_path('views/service.blade.php'),

        ], 'cms-stubs');

        Livewire::component('media-browser', MediaBrowser::class);
        Livewire::component('enquiry-form', EnquiryForm::class);

        Livewire::component('image-block', ImageBlock::class);
        Livewire::component('gallery-block', GalleryBlock::class);
        Livewire::component('contact-block', ContactBlock::class);
        Livewire::component('cta-block', CtaBlock::class);
        Livewire::component('rich-text-block', RichTextBlock::class);
        Livewire::component('events-block', EventsBlock::class);
        Livewire::component('features-block', FeaturesBlock::class);
        Livewire::component('posts-block', PostsBlock::class);
        Livewire::component('slider-block', SliderBlock::class);
        Livewire::component('testimonials-block', TestimonialsBlock::class);
        Livewire::component('list-block', ListBlock::class);
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();

        $this->app->singleton(CmsSettings::class, function () {
            return CmsSettings::make(storage_path('app/settings.json'));
        });
    }
}
