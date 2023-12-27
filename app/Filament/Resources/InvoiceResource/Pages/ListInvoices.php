<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use Filament\Actions;
use App\Models\Invoice;
use pxlrbt\FilamentExcel\Columns\Column;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InvoiceResource;
use Filament\Resources\Pages\ListRecords\Tab;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ExportAction::make()->exports([
                 ExcelExport::make()->withColumns([
                    Column::make('id')->heading('ID'),
                    Column::make('pakets.name')->heading('Paket'),
                    Column::make('users.nama')->heading('Nama'),
                    Column::make('pakets.harga')->heading('Harga'),
                    Column::make('created_at')->heading('Creation date'),
                    Column::make('createduser.nama')->heading('Created By'),
                    Column::make('approveduser.nama')->heading('Approved By'),
                    Column::make('status')->heading('Status')
                    ->formatStateUsing(function ($state){
                        if($state == 1){
                            return 'Active';
                        } else {
                            return 'Pending';
                        }
                    }),
    ])->withFilename('Invoice_'. date("Y-m-d") ),
            ])
        ];
    }


    public function getTabs(): array
    {

        return [


            "This Week" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    $data = Invoice::where('created_at', '>=', now()->subWeek())
                    ->orderBy('id','desc');
                    return $data ;
                }),
            "This month" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    $data = Invoice::where('created_at', '>=', now()->subMonth())
                    ->orderBy('id','desc');
                    return $data ;
                }),
            "All" => Tab::make(),
        ];
    }
}
