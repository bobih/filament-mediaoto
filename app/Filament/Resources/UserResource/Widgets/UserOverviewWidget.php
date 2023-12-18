<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\Invoice;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserOverviewWidget extends BaseWidget
{

   // protected static ?string $pollingInterval = '5s'; <- Set Ajax

    protected static ?string $pollingInterval = null; // <-- disable Ajax

    protected function getCards(): array
    {
        return [
            Card::make("Silver User", Invoice::where('paketid',2) ->count())
            ->label('')
            ->description('Silver Account'),
            Card::make("Gold User", Invoice::where('paketid',3) ->count())
            ->label('')
            ->description('Gold Account'),
        ];
    }
}
