<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use App\Models\Invoice;
use Filament\Actions;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

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
                    $data = Invoice::where('created_at', '>=', now()->subWeek());
                    //->orderBy('users.id','desc');
                    return $data ;
                }),
            "This month" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    $data = Invoice::where('created_at', '>=', now()->subMonth());
                    //->orderBy('users.id','desc');
                    return $data ;
                }),
            "All" => Tab::make(),
        ];
    }
}
