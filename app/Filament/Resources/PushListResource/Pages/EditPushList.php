<?php

namespace App\Filament\Resources\PushListResource\Pages;

use App\Filament\Resources\PushListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPushList extends EditRecord
{
    protected static string $resource = PushListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
