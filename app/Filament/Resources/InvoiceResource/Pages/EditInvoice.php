<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use auth;
use Filament\Actions;
use App\Models\Invoice;
use App\Models\PushList;
use App\Models\PushTemp;
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
            Actions\DeleteAction::make()
            ->visible(function (){
                $user = auth()->user()->id;
                if($user == "36"){
                    return true;
                } else {
                    return true;
                }
            }),
            EditAction::make('Approved')
            ->label('Approved')
            ->before(function (EditAction $action,Invoice $records) {

                if($records->approved !=1){
                        $records->approved = auth()->user->id;
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
            ->successRedirectUrl(route('filament.dash.resources.invoices.index'))
            ->visible(function (){
                $user = auth()->user()->id;
                if($user == "36"){
                    return true;
                } else {
                    return false;
                }
            }),
        ];
    }
}
