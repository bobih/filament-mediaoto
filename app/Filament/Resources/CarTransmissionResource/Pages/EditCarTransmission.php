<?php

namespace App\Filament\Resources\CarTransmissionResource\Pages;

use App\Filament\Resources\CarTransmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarTransmission extends EditRecord
{
    protected static string $resource = CarTransmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
