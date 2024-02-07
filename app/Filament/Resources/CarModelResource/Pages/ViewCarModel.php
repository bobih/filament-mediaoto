<?php

namespace App\Filament\Resources\CarModelResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\CarModelResource;
use App\Filament\Resources\CarModelResource\RelationManagers;

class ViewCarModel extends ViewRecord
{
    protected static string $resource = CarModelResource::class;


    public function getRelationManagers(): array
    {
            return [
                RelationManagers\CarvariantRelationManager::class,


            ];


    }

}


