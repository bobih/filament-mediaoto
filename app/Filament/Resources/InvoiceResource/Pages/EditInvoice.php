<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Models\PushList;
use App\Models\PushTemp;
use Filament\Actions;
use App\Models\Invoice;
use Livewire\Attributes\On;
use Filament\Actions\Action;

use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\InvoiceResource;



class EditInvoice extends EditRecord
{
    protected static string $resource = InvoiceResource::class;



    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            EditAction::make('Approved')
            ->label('Approved')
            ->before(function (EditAction $action,Invoice $records) {

                if($records->approved !=1){
                        $records->approved = 1;
                        $records->status = 1;

                        // Move List To Push_list;
                        $tempList = PushTemp::where('userid', $records->userid)->get();
                        foreach($tempList as $list){
                            $pushModel = new PushList();
                            $pushModel->userid = $list->userid;
                            $pushModel->leadsid = $list->leadsid;
                            $pushModel->tanggal = $list->tanggal;
                            $pushModel->save();
                        }

                        // Delete Push Temp
                        $deleteTemp = PushTemp::where('userid', $records->userid);
                        $deleteTemp->delete();


                        Notification::make()
                        ->success()
                        ->title('User updated')
                        ->body('The user has been saved successfully.')
                        ->send();

                        $action->success();
                    } else {
                        Notification::make()
                        ->danger()
                        ->title('Warning')
                        ->body('User Already Approved')
                        ->send();


                        $action->halt();
                    }
            })
            ->successRedirectUrl(route('filament.dash.resources.invoices.index')),
        ];
    }
}
