<?php

namespace App\Filament\Pages;


class Dashboard extends \Filament\Pages\Dashboard
{


    public function getColumns(): int | string | array
    {
        //Set dashboard col
        return 2;
    }
}
