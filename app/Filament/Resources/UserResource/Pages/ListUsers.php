<?php

namespace App\Filament\Resources\UserResource\Pages;


use App\Models\User;
use Filament\Actions;
use App\Models\Prospek;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords\Tab;


class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {

        return [


            "This Week" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    $data = User::where('created_at', '>=', now()->subWeek())
                    ->orderBy('users.id','desc');
                    return $data ;
                }),
            "Active" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                     $data = User::select('users.*','invoice.status')
                     ->leftJoin('invoice','invoice.userid','users.id')
                     ->where('invoice.status',1)->orderBy('users.id','desc');

                    return $data;
                }),
            "All" => Tab::make(),
        ];
    }

    /*
    protected function getTableQuery(): Builder {
        return parent::getTableQuery()->orderBy("id","DESC");
    }
    */

}
