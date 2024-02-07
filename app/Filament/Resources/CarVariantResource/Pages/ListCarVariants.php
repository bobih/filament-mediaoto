<?php

namespace App\Filament\Resources\CarVariantResource\Pages;

use App\Filament\Resources\CarVariantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarVariants extends ListRecords
{
    protected static string $resource = CarVariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
