<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use App\Models\Invoice;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserOverviewWidget extends BaseWidget
{
    use HasWidgetShield;

   // protected static ?string $pollingInterval = '5s'; <- Set Ajax

    protected static ?string $pollingInterval = null; // <-- disable Ajax

    protected function getStats(): array
    {
        return [
            Stat::make("Silver User", Invoice::where('paketid',2) ->count())
            ->label('')
            ->description('Silver Account'),
            Stat::make("Gold User", Invoice::where('paketid',3) ->count())
            ->label('')
            ->description('Gold Account'),
        ];
    }
}
