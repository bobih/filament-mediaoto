<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->visible(function (){
                $user = auth()->user()->id;
                if($user == "37"){
                    return true;
                } else {
                    return false;
                }
            }),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return route(name:'filament.dash.resources.user-List.index');
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UserResource\Widgets\ProspekInfoWidget::class,
        ];
    }
}
