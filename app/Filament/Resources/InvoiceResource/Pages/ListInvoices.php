<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use Filament\Actions;
use App\Models\Invoice;
use Filament\Resources\Components\Tab;
use pxlrbt\FilamentExcel\Columns\Column;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

use App\Filament\Resources\InvoiceResource;
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
                    Column::make('pakets.paket_id')->heading('Paket ID'),
                    Column::make('pakets.name')->heading('Paket'),
                    Column::make('users.nama')->heading('Nama'),
                    Column::make('pakets.harga')->heading('Harga'),
                    Column::make('created_at')->heading('Creation date'),
                    Column::make('createduser.nama')->heading('Created By'),
                    Column::make('approveduser.nama')->heading('Approved By'),
                    Column::make('status')->heading('Status')
                        ->formatStateUsing(function ($state) {
                            if ($state == 1) {
                                return 'Active';
                            } else {
                                return 'Pending';
                            }
                        }),
                ])->withFilename('Invoice_' . date("Y-m-d")),
            ])
                ->color('info')
        ];
    }


    public function getTabs(): array
    {

        if(auth()->id() == 36 || auth()->id() == 113 || auth()->id() == 38 ){
            return [
                "This Week" => Tab::make()
                    ->modifyQueryUsing(function (Builder $query) {
                        $data = Invoice::where('invoice.created_at', '>=', now()->subWeek())
                            ->orderBy('id', 'desc');
                        return $data;
                    }),
                "This month" => Tab::make()
                    ->modifyQueryUsing(function (Builder $query) {
                        $data = Invoice::where('invoice.created_at', '>=', now()->subMonth())
                        ->orderBy('id', 'desc');

                        return $data;
                    }),
                "All" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    $data = Invoice::orderBy('id', 'desc');
                    return $data;
                }),
            ];
        } else {
            return [
                "This Week" => Tab::make()
                    ->modifyQueryUsing(function (Builder $query) {
                        $data = Invoice::where('invoice.created_at', '>=', now()->subWeek())
                            ->orderBy('id', 'desc')
                            ->where('createdby',auth()->id());
                        return $data;
                    }),
                "This month" => Tab::make()
                    ->modifyQueryUsing(function (Builder $query) {
                        $data = Invoice::where('invoice.created_at', '>=', now()->subMonth())
                        ->where('createdby',auth()->id())
                        ->orderBy('id', 'desc');

                        return $data;
                    }),
                "All" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    $data = Invoice::where('createdby',auth()->id())
                    ->orderBy('id', 'desc');
                    return $data;
                }),
            ];
        }
    }
}
