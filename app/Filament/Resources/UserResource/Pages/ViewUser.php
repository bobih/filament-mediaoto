<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\UserResource\RelationManagers;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
           // UserResource\Widgets\ProspekInfoWidget::class,
        ];
    }

    public function getRelationManagers(): array
    {
        if(auth()->id() == $this->record->id &&  auth()->id() <> 36){
            return [];
        } else {
            return [
                RelationManagers\ProspekRelationManager::class,
                RelationManagers\PushlistRelationManager::class,
                RelationManagers\CalllistRelationManager::class,
                RelationManagers\WhatsapplistRelationManager::class,
                RelationManagers\LostRelationManager::class,

            ];
        }

    }
}
