<?php

namespace App\Filament\Resources;

use ErrorException;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Brand;

use App\Models\Leads;
use App\Models\Paket;
use App\Models\Invoice;
use Filament\Forms\Set;
use App\Models\PushTemp;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Infolists\Components;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Components\Fieldset;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers\PushtempRelationManager;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        // $invoiceModel = $form->getModel();

        return $form
            ->schema([

                Fieldset::make('Info')
                ->schema([

                        Forms\Components\Select::make('userid')
                            ->label('Nama')
                            ->options(function (User $user) {
                                $user = User::where('brand', '>', 0)

                                    ->whereNotIn('id', function ($q) {
                                        $q->select('userid')->from('invoice');
                                    })
                                    ->where('acctype','>',0)
                                    ->pluck('nama', 'id');
                                return $user;


                    })
                    //->relationship('users', 'nama')
                    ->getOptionLabelUsing(fn($value): ?string => User::find($value)?->nama)
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $userModel = new User();
                        $user = $userModel->where('id', $state)->first();
                        $set('paketid', $user->acctype);
                    })
                    ->disabled(fn(string $operation): bool => $operation === 'edit'),


                ]),

                Fieldset::make('Settings')
                    ->schema([
                        Forms\Components\Select::make('model')
                            ->multiple()
                            ->options(function (Invoice $invoice) {
                                if ($invoice->userid) {
                                    $user = User::where('id', $invoice->userid)->first();
                                    $list = Leads::select('model')
                                        ->where('brand', $user->brand)
                                        ->whereNotNull('model')
                                        ->groupBy('model')
                                        ->pluck('model', 'model');
                                    return $list;
                                }
                            })->hidden(fn(string $operation): bool => $operation === 'create'),

                        Forms\Components\DatePicker::make('datadate')
                            ->label("Set Data Date")
                            ->default(now())
                            ->native(false)
                            ->format('Y-m-d')
                            ->hidden(fn(string $operation): bool => $operation === 'create'),

                        Forms\Components\Actions::make([

                            Forms\Components\Actions\Action::make('Generate List')
                                ->action(function ( $action, Forms\Get $get, Forms\Set $set) {
                                    // Delete PushList
                                    if ($get('userid')) {


                                        $userid = $get('userid');
                                        $datadate = $get('datadate');
                                        $model = $get('model');

                                        //Get UserInfo
                                        $userModel = new User();
                                        $user = $userModel->where('id', $userid)->first();

                                        $set('paketid', $user->acctype);

                                        $brand = $user->brand;
                                        $paketModel = new Paket();
                                        $paket = $paketModel->where('id', $user->acctype)->first();

                                        try {

                                            $quota = $paket->quota;
                                        } catch (ErrorException $e) {
                                            $error = $e->getMessage();
                                            Notification::make()->danger()->title("Please Check User Data")->icon('heroicon-o-check')->send();

                                           $action->cancel();

                                        }

                                        // Delete
                                        $templist = PushTemp::where('userid', '=', $userid)->delete();

                                        //Generate List
                                        $pushList = Leads::query()->where('brand', $brand)->whereNotIn('id', function ($q) use ($userid, $datadate) {
                                            $q->select('leadsid')->from('prospek')->where('userid', $userid);
                                        });
                                        $pushList->whereDate('create', '<=', $datadate);
                                        if ($model) {
                                            //$idsArr = explode(',',$model);
                                            $pushList->whereIn('model', $model);
                                        }
                                        $pushList->orderBy('create', 'desc');
                                        $pushList->take($quota);

                                        $totalData = $pushList->get()->count();
                                        if($totalData < $quota){
                                            Notification::make()->danger()->title('Error : Not Enough Data ('.$totalData.')')->icon('heroicon-o-check')->send();
                                            $action->cancel();
                                        }

                                        // dd($pushList->toRawSql());
                                        // Save Temporary
                                        foreach ($pushList->get() as $list) {
                                            $pushTemp = new PushTemp();
                                            $pushTemp->userid = $userid;
                                            $pushTemp->leadsid = $list->id;
                                            $pushTemp->save();
                                        }
                                        Notification::make()->success()->title('Generate Success')->icon('heroicon-o-check')->send();
                                    }
                                })->after(function ($livewire) {
                                    $livewire->dispatch('refreshExampleRelationManager');
                                })->hidden(fn(string $operation): bool => $operation === 'create'),

                            Forms\Components\Actions\Action::make('Reset')
                                ->action(function (Forms\Get $get, Forms\Set $set) {
                                    if ($get('userid')) {
                                        $userid = $get('userid');
                                        $templist = PushTemp::where('userid', '=', $userid)->delete();

                                        Notification::make()->success()->title('Success')->icon('heroicon-o-check')->send();
                                    }
                                })->after(function ($livewire) {
                                    $livewire->dispatch('refreshExampleRelationManager');
                                })->hidden(fn(string $operation): bool => $operation === 'create'),
                        ]),
                    ])->columns(1)
                    ->hidden(function ($operation, $record): bool {
                        if ($operation === 'edit') {
                            if ($record->status == 1) {
                                return true;
                            } else {
                                return false;
                            }
                        } else {
                            return true;
                        }
                    }),

                Forms\Components\Hidden::make('tanggal')
                    ->default(function (mixed $state) {
                        return date('Y-m-d H:i:s');
                    }),

                Forms\Components\Hidden::make('paketid'),

                Forms\Components\Hidden::make('createdby')
                    ->default(function (mixed $state) {
                        return auth()->user()->id;
                    }),

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal'),
                Tables\Columns\TextColumn::make('users.nama')
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('pakets.name')
                    ->label('Paket'),
                Tables\Columns\TextColumn::make('createduser.nama')
                    ->label('Create'),
                //Tables\Columns\TextColumn::make('approveduser.nama')
                //    ->label('Approved'),
                //
                Tables\Columns\IconColumn::make('status')
                ->icon(fn (string $state): string => match ($state) {
                    '1' => 'heroicon-o-check-badge',
                    '0' => 'heroicon-o-x-mark',
                    default => 'heroicon-o-x-mark',
                })
                ->color(fn (string $state): string => match ($state) {
                    '1' => 'success',
                    '0' => 'gray',
                    default => 'gray',
                }),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([

                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Components\Section::make()
                    ->schema([
                        Components\TextEntry::make("Check Info"),

                    ]),
            ]);

    }

    public static function getRelations(): array
    {
        return [
            PushtempRelationManager::class,
        ];
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
            // 'view' => Pages\ViewInvoice::route('/{record}'),
        ];
    }
}
