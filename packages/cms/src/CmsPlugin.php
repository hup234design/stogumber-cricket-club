<?php

namespace Hup234design\Cms;

use Filament\Contracts\Plugin;
use Filament\Forms\Components\Select;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Hup234design\Cms\Filament\Pages\ManageSettings;
use Hup234design\Cms\Filament\Resources\EnquiryResource;
use Hup234design\Cms\Filament\Resources\EventCategoryResource;
use Hup234design\Cms\Filament\Resources\EventResource;
use Hup234design\Cms\Filament\Resources\IndexPageResource;
use Hup234design\Cms\Filament\Resources\MediaImageResource;
use Hup234design\Cms\Filament\Resources\PageResource;
use Hup234design\Cms\Filament\Resources\PostCategoryResource;
use Hup234design\Cms\Filament\Resources\PostResource;
use Hup234design\Cms\Filament\Resources\ProjectCategoryResource;
use Hup234design\Cms\Filament\Resources\ProjectResource;
use Hup234design\Cms\Filament\Resources\ServiceCategoryResource;
use Hup234design\Cms\Filament\Resources\ServiceResource;
use Hup234design\Cms\Filament\Resources\SliderResource;
use Hup234design\Cms\Filament\Resources\UserResource;
use Illuminate\Support\Facades\DB;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Pboivin\FilamentPeek\FilamentPeekPlugin;
use RyanChandler\FilamentNavigation\Filament\Resources\NavigationResource;
use RyanChandler\FilamentNavigation\FilamentNavigation;

class CmsPlugin implements Plugin
{
    public function getId(): string
    {
        return 'cms';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function register(Panel $panel): void
    {
        $panel
//            ->navigationGroups([
//                NavigationGroup::make()
//                    ->label('Pages')
////                    ->icon('heroicon-o-document-text')
//                    ->collapsed(),
//                NavigationGroup::make()
//                    ->label('Posts')
////                    ->icon('heroicon-o-newspaper')
//                    ->collapsed(),
//                NavigationGroup::make()
//                    ->label('Events')
////                    ->icon('heroicon-o-calendar-days')
//                    ->collapsed(true),
//                NavigationGroup::make()
//                    ->label('Services')
////                    ->icon('heroicon-o-rectangle-stack')
//                    ->collapsed(),
//                NavigationGroup::make()
//                    ->label('Projects')
////                    ->icon('heroicon-o-rectangle-stack')
//                    ->collapsed(true),
//                NavigationGroup::make()
//                    ->label('Media')
////                    ->icon('heroicon-o-photo')
//                    ->collapsed(),
//                NavigationGroup::make()
//                    ->label('Enquiries')
////                    ->icon('heroicon-o-inbox')
//                    ->collapsed(),
//                NavigationGroup::make()
//                    ->label('Site Management')
////                    ->icon('heroicon-o-cog-8-tooth')
//                    ->collapsed()
//            ])
            ->resources([
                PageResource::class,
                IndexPageResource::class,
                PostResource::class,
                PostCategoryResource::class,
                EventResource::class,
                EventCategoryResource::class,
                MediaImageResource::class,
                ServiceResource::class,
                ServiceCategoryResource::class,
                SliderResource::class,
                EnquiryResource::class,
                ProjectResource::class,
                ProjectCategoryResource::class,
                UserResource::class,
            ])
            ->pages([
                ManageSettings::class,
            ])
            ->userMenuItems([
                MenuItem::make()
                    ->label('View Site')
                    ->url('/')
                    ->openUrlInNewTab(true),
                    //->icon('heroicon-o-home'),
            ])
            ->maxContentWidth('full')
            ->plugins([
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                        shouldRegisterNavigation: false, // Adds a main navigation item for the My Profile page (default = false)
                        hasAvatars: false, // Enables the avatar upload form component (default = false)
                        slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')
                    ),
                //FilamentPeekPlugin::make(),
                FilamentNavigation::make()
                    ->itemType('Home',[])
                    ->itemType('Page', [
                        Select::make('id')
                            ->options(function () {
                                return DB::table('pages')
                                    ->where('home', false)
                                    ->whereIn('type',['page','index'])
                                    ->pluck('title', 'id');
                            })
                    ])
                    ->itemType('Dropdown', [])
            ])
            ->sidebarCollapsibleOnDesktop(true);
    }

    public function boot(Panel $panel): void
    {
        NavigationResource::navigationGroup('Site Management');
        NavigationResource::navigationSort(2);
//        NavigationResource::navigationIcon(false);
    }

    public static function get(): Plugin | \Filament\FilamentManager
    {
        return filament(app(static::class)->getId());
    }
}
