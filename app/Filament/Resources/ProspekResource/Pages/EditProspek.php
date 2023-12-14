<?php

namespace App\Filament\Resources\ProspekResource\Pages;

use App\Filament\Resources\ProspekResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProspek extends EditRecord
{
    protected static string $resource = ProspekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
