<?php

namespace App\Filament\Resources\PushTempResource\Pages;

use App\Filament\Resources\PushTempResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPushTemp extends EditRecord
{
    protected static string $resource = PushTempResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
