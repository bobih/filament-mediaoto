<?php

namespace App\Filament\Resources\PushListResource\Pages;

use App\Filament\Resources\PushListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPushLists extends ListRecords
{
    protected static string $resource = PushListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
