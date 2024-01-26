<?php

namespace App\Filament\Pages;


class Dashboard extends \Filament\Pages\Dashboard
{


    protected function getHeaderWidgets(): array
    {
        return [
            \BezhanSalleh\FilamentGoogleAnalytics\Widgets\PageViewsWidget::class,
            \BezhanSalleh\FilamentGoogleAnalytics\Widgets\VisitorsWidget::class,

        ];
    }

    public function getColumns(): int | string | array
    {
        //Set dashboard col
        return 2;
    }
}
