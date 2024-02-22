<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;
use App\Filament\Resources\NewsPostResource;
use App\Filament\Resources\NewsCategoryResource;

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
        $lang = Session::get('applocale');

       // dd($lang);
        if($lang == null){
            $lang = 'id';

            Session::put('applocale', 'id');
            app()->setLocale('id');

        }

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
