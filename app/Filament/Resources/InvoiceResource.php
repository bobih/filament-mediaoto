<?php

namespace App\Filament\Resources;

use ErrorException;
use Filament\Forms;

use App\Models\User;
use Filament\Tables;
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
use App\Http\Controllers\DeliveryController;
use App\Filament\Resources\InvoiceResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use App\Filament\Resources\InvoiceResource\RelationManagers\PushtempRelationManager;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;
    protected static ?int $navigationSort = 2;

   // protected static ?string $recordTitleAttribute = 'nama';
   //protected static ?string $navigationGroup = 'Invoices';

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    /*
    public static function viewAny(User $user): bool  {
        return $user->can('viewAny');
    }
    */

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Fieldset::make('Info')
                    ->schema([

                        Forms\Components\Select::make('userid')
                            ->label('Nama')
                            ->relationship('users', 'nama')
                            ->disabledOn('edit')
                            ->visibleOn('edit'),


                        Forms\Components\Select::make('userid')
                            ->label('Nama')
                            ->options(function (User $user) {
                                $user = User::where('brand', '>', 0)
                                    //->whereNotIn('id', function ($q) {
                                    //    $q->select('userid')->from('invoice');
                                    //})
                                    //->where('acctype', '>', 0)
                                    ->where('showroom', '>', 0)
                                    ->where('showroom', '<>', '')
                                    ->where('brand', '<>', 99)
                                    ->where('id', '<>', 36)
                                    ->get();
                                    //->pluck('nama', 'id');

                                    $return = [];
                                foreach($user as $data){
                                    $return[$data->id] = $data->nama . ' - ' . $data->email ;
                                }
                                //dd($return);

                                return $return;
                            })
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Set $set, $state) {
                                $userModel = new User();
                                $user = $userModel->where('id', $state)->first();
                                $set('paketid', $user->acctype);
                            })
                            ->visibleOn('create'),


                        Forms\Components\Select::make('paketid')
                            ->label('Paket')
                            ->relationship('pakets', 'name')
                            ->preload()
                            ->required()
                            ->disabled(fn(string $operation): bool => $operation === 'edit'),

                        /*
                        Forms\Components\Hidden::make('quota'),
                        */


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
                                ->action(function ($action, Forms\Get $get, Forms\Set $set, Invoice $records) {
                                    // Delete PushList
                                    if ($get('userid')) {


                                        $userid = $get('userid');
                                        $datadate = $get('datadate');
                                        $model = $get('model');

                                        //Get UserInfo
                                        $userModel = new User();
                                        $user = $userModel->where('id', $userid)->first();

                                        //$set('paketid', $user->acctype);

                                        $brand = $user->brand;
                                        $paketModel = new Paket();
                                        $paket = $paketModel->where('id', $records->paketid)->first();

                                        try {

                                            $quota = $paket->quota;
                                        } catch (ErrorException $e) {
                                            $error = $e->getMessage();
                                            Notification::make()->danger()->title("Please Check User Data")->icon('heroicon-o-check')->send();

                                            $action->cancel();

                                        }

                                        // Delete
                                        $templist = PushTemp::where('userid', '=', $userid)->delete();
                                        $pushList = Leads::select('id')->where('brand', $brand);


                                        $pushList->whereDate('create', '<=', $datadate);




                                        // Get ExceptionList
                                        $deliveryController = new DeliveryController();
                                        $exceptionList = $deliveryController->getExceptionList($user->id, $user->showroom);

                                        //dd($exceptionList);
                                        if (count($exceptionList) > 0) {
                                            $pushList->whereNotIn('id', $exceptionList);
                                        }



                                        if ($model) {
                                            $idsArr = implode(',',$model);
                                            //dd($idsArr);

                                            $pushList->whereIn('model', $model);
                                        }
                                        $pushList->orderBy('create', 'desc');
                                        $pushList->take($quota);
                                        //dd($pushList->toRawSql());

                                        $totalData = $pushList->get()->count();
                                        if ($totalData < $quota) {
                                            Notification::make()->danger()->title('Error : Not Enough Data (' . $totalData . ')')->icon('heroicon-o-check')->send();
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
                                })->hidden(fn(string $operation): bool => $operation === 'create')
                                ->color('info'),

                            Forms\Components\Actions\Action::make('Reset')
                                ->action(function (Forms\Get $get, Forms\Set $set) {
                                    if ($get('userid')) {
                                        $userid = $get('userid');
                                        $templist = PushTemp::where('userid', '=', $userid)->delete();

                                        Notification::make()->success()->title('Success')->icon('heroicon-o-check')->send();
                                    }
                                })->after(function ($livewire) {
                                    $livewire->dispatch('refreshExampleRelationManager');
                                })->hidden(fn(string $operation): bool => $operation === 'create')
                                ->color('info'),
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


                    SpatieMediaLibraryImageColumn::make('')
                    ->label('Avatar')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(function(Invoice $record){
                        //dd($record);
                        if($record->users->image){
                            return Url(env('IMAGE_URL') .'/images/'. $record->users->image);
                        } else {
                            return Url(env('IMAGE_URL') . '/images/blank.png');
                        }
                    })
                    ->alignment(Alignment::Center)
                    ->grow(false),


                    /*
                Tables\Columns\ImageColumn::make('users.image')
                    ->label('Avatar')
                    ->circular()
                    ->defaultImageUrl(env('IMAGE_URL') . '/images/blank.png')
                    ->alignment(Alignment::Center)
                    ->grow(false),
                    */

                Tables\Columns\TextColumn::make('users.nama')
                    ->label('Nama'),

                /*
                Tables\Columns\TextColumn::make('brands.brand')
                ->label('Brand'),
                */
                Tables\Columns\TextColumn::make('pakets.name')
                    ->label('Paket'),
                Tables\Columns\TextColumn::make('createduser.nama')
                    ->label('Create'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal'),

                //Tables\Columns\TextColumn::make('approveduser.nama')
//    ->label('Approved'),
//
                Tables\Columns\IconColumn::make('status')
                    ->icon(fn(string $state): string => match ($state) {
                        '1' => 'heroicon-o-check-badge',
                        '0' => 'heroicon-o-x-mark',
                        default => 'heroicon-o-x-mark',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        '1' => 'success',
                        '0' => 'gray',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->visible(function (): bool {
                        return false;
                    }),
                Tables\Actions\EditAction::make()
                    ->visible(function (Invoice $records): bool {
                        if ($records->status == 0) {
                            return true;
                        } else {
                            return false;
                        }
                    }),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // ExportBulkAction::make(),

                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Components\ImageEntry::make('users.image')
                    ->hiddenLabel()
                    ->circular()
                    ->checkFileExistence(false)
                    ->alignCenter(true)
                    ->visible(function ($state): bool {
                        if ($state == '' || is_array($state)) {
                            return false;
                        } else {
                            return true;
                        }
                    })
                    ->grow(false),

                Components\Section::make()
                    ->schema([
                        Components\Split::make([
                            Components\Grid::make(2)
                                ->schema([
                                    //Components\TextEntry::make("Check Info"),
                                    Components\TextEntry::make('users.nama')
                                        ->label('Nama'),
                                    Components\TextEntry::make('users.phone')
                                        ->label('Phone'),
                                    Components\TextEntry::make('users.email')
                                        ->label('Email'),
                                    Components\TextEntry::make('users.brands.brand')
                                        ->label('Brand'),
                                    Components\TextEntry::make('users.alamat')
                                        ->label('Alamat'),
                                    Components\TextEntry::make('users.showrooms.showroom')
                                        ->label('Showroom'),

                                ]), // Grid
                        ]), // Split

                ]),


                Components\Section::make()
                    ->schema([
                        Components\Split::make([
                            Components\Grid::make(2)
                                ->schema([
                                    Components\TextEntry::make('pakets.name')
                                        ->label('Paket'),
                                    Components\TextEntry::make('createduser.nama')
                                        ->label('Created'),
                                    Components\TextEntry::make('approveduser.nama')
                                        ->label('Approved'),

                                ]), // Grid
                        ]), // Split

                ]),// Section
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
            'view' => Pages\ViewInvoice::route('/{record}'),
        ];
    }
}
