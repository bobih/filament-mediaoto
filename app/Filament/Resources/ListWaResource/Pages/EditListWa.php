<?php

namespace App\Filament\Resources\ListWaResource\Pages;

use App\Filament\Resources\ListWaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditListWa extends EditRecord
{
    protected static string $resource = ListWaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
