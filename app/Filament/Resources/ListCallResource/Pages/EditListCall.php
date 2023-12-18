<?php

namespace App\Filament\Resources\ListCallResource\Pages;

use App\Filament\Resources\ListCallResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Livewire\Attributes\On;

class EditListCall extends EditRecord
{
    protected static string $resource = ListCallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }



    #[On('refreshForm')]
    public function refreshForm(): void
    {
        parent::refreshFormData(array_keys($this->record->toArray()));
    }
}
