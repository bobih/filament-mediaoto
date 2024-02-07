<?php

namespace App\Filament\Resources\CarVariantResource\Pages;

use App\Filament\Resources\CarVariantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarVariant extends EditRecord
{
    protected static string $resource = CarVariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
