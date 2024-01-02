<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    public function getRelationManagers(): array
    {
        return [];
    }

    protected function getHeaderActions(): array
    {
        if(auth()->id() == 36){
        return [
            Actions\DeleteAction::make(),
        ];
     } else {
        return [
            //Actions\DeleteAction::make(),
        ];
    }

    }
}
