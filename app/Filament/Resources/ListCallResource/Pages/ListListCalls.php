<?php

namespace App\Filament\Resources\ListCallResource\Pages;

use App\Filament\Resources\ListCallResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListListCalls extends ListRecords
{
    protected static string $resource = ListCallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
