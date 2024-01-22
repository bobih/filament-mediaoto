<?php

namespace App\Filament\Pages;
use BezhanSalleh\FilamentGoogleAnalytics\Widgets;

class Dashboard extends \Filament\Pages\Dashboard
{


    public function getColumns(): int | string | array
    {
        //Set dashboard col
        return 2;
    }
}
