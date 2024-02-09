<?php

namespace App\Providers;

use App\Filament\Resources\NewsCategoryResource;
use App\Filament\Resources\NewsPostResource;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       // if (env('APP_ENV','local')) {
       //     $this->app->register('Barryvdh\Debugbar\ServiceProvider');
       // }

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                     ->label('User'),
                NavigationGroup::make()
                     ->label('Invoice')
                     ->collapsed(),
                NavigationGroup::make()
                    ->label('News')
                    ->collapsed()
                    ->items([

                        ... NewsCategoryResource::getNavigationItems(),
                        ... NewsPostResource::getNavigationItems(),
                    ]),
                NavigationGroup::make()
                    ->label('Settings')
                    ->collapsed(),
            ]);
        });
        */
    }
}
