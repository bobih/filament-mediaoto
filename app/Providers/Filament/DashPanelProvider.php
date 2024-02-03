<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use App\Filament\Pages\AnalyticsPage;
use App\Filament\Pages\Auth\EditProfile;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\AvatarProviders\CustomAvatarsProvider;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use BezhanSalleh\FilamentGoogleAnalytics\Widgets\PageViewsWidget;
use App\Filament\Resources\UserResource\Widgets\UserOverviewWidget;


class DashPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        app()->setLocale('en');
        return $panel
            ->default()
            ->id('dash')
            ->path('dash')
            ->spa()
            ->login()
            ->profile(EditProfile::class)
            ->darkMode(true)
            ->brandName('Mediaoto')
           // ->viteTheme('resources/css/filament/dash/theme.css')
            //->brandLogo(asset('images/white_logo.png'))
            ->favicon(asset('favicon.ico'))
            ->colors([
                'primary' => Color::Amber,
            ])
            ->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make()
            ])

            ->defaultAvatarProvider(CustomAvatarsProvider::class)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->navigationGroups([
                'Users',
                'Invoices',
                'SEO',
                'News',
                'Settings',

            ])
            ->navigationItems([

            ])
            ->pages([
               AnalyticsPage::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                UserOverviewWidget::class,
                PageViewsWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
