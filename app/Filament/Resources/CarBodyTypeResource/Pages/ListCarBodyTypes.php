<?php

namespace App\Filament\Resources\CarBodyTypeResource\Pages;

use App\Filament\Resources\CarBodyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarBodyTypes extends ListRecords
{
    protected static string $resource = CarBodyTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
