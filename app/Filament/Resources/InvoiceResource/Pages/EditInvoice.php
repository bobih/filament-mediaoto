<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use auth;
use App\Models\User;
use App\Models\Paket;
use Filament\Actions;
use App\Models\Invoice;
use App\Models\PushList;
use App\Models\PushTemp;
use Livewire\Attributes\On;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\InvoiceResource;
use App\Http\Controllers\DeliveryController;



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
            ->color('info')
            ->before(function (EditAction $action,Invoice $records) {
                 $isValid = true;
                if($records->status !=1){
                        $records->approved = auth()->user()->id;
                        $records->status = 1;
                        // update User Status

                        // Get quota
                        $listPaket = Paket::where('id',$records->paketid)->first();
                        $quota = $listPaket->quota;




                        $user = User::where('id', $records->userid)->first();
                        $newquota = $user->quota + $quota;

                        DB::table('users')
                        ->where('id', $records->userid)
                        ->update(['quota' => $newquota, 'acctype' => $records->paketid]);

                        $deliveryController = new DeliveryController();
                        $pushTemp = $deliveryController->createPushList($records->userid);
                        if($pushTemp->getStatusCode() != 200){
                            $isValid = false;
                            Notification::make()
                            ->danger()
                            ->title('Warning')
                            ->body($pushTemp->getContent())
                            ->send();
                            $action->cancel();
                        }

                    } else {
                        $isValid = false;
                        Notification::make()
                        ->danger()
                        ->title('Warning')
                        ->body('User Already Approved')
                        ->send();
                        $action->cancel();
                    }
                    // Save if Valid
                    if($isValid){
                        Notification::make()
                        ->success()
                        ->title('User updated')
                        ->body('The user has been saved successfully.')
                        ->send();

                        $action->success();
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
