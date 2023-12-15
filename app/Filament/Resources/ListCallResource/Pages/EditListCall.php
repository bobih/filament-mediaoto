<?php

namespace App\Filament\Resources\ListCallResource\Pages;

use App\Filament\Resources\ListCallResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditListCall extends EditRecord
{
    protected static string $resource = ListCallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
