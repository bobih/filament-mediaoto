<?php

namespace App\Filament\Resources\CarTransmissionResource\Pages;

use App\Filament\Resources\CarTransmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarTransmissions extends ListRecords
{
    protected static string $resource = CarTransmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
