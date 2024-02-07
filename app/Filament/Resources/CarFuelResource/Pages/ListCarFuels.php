<?php

namespace App\Filament\Resources\CarFuelResource\Pages;

use App\Filament\Resources\CarFuelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarFuels extends ListRecords
{
    protected static string $resource = CarFuelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
