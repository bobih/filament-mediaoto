<?php

namespace App\Filament\Resources\CarFuelResource\Pages;

use App\Filament\Resources\CarFuelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarFuel extends EditRecord
{
    protected static string $resource = CarFuelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
