<?php

namespace App\Filament\Resources\PushTempResource\Pages;

use App\Filament\Resources\PushTempResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPushTemps extends ListRecords
{
    protected static string $resource = PushTempResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
