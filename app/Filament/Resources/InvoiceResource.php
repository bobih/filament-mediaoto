<?php

namespace App\Filament\Resources;

use Closure;
use ErrorException;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Leads;
use App\Models\Paket;
use App\Models\Invoice;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Livewire\Component;
use App\Models\PushTemp;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Infolists\Components;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use App\Filament\Resources\InvoiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\PushlistRelationManager;
use App\Filament\Resources\InvoiceResource\RelationManagers\PushtempRelationManager;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('userid')
                ->label('Nama')
                ->relationship('users', 'nama')
                ->searchable()
                ->preload()
                ->live()
                ->afterStateUpdated( function (Set $set, $state){
                    $userModel = new User();
                    $user = $userModel->where('id',$state)->first();
                    $set('paketid', $user->acctype);
                }),
                /*
                Forms\Components\Select::make('brand')
                ->label('Brand')
                ->relationship('brands', 'brand')
                ->searchable()
                ->preload()
                ->required(),

                Forms\Components\Select::make('paketid')
                ->label('Paket')
                ->relationship('pakets', 'name')
                ->searchable()
                ->preload()
                ->required(),
                */
                Forms\Components\DatePicker::make('datadate')
                ->label("Data Tanggal")
                ->default(now())
                ->native(false)
                ->format('Y-m-d'),


                Forms\Components\Hidden::make('tanggal')
                ->default(function (mixed $state){
                    return date('Y-m-d H:i:s');
                }),

                Forms\Components\Hidden::make('paketid'),

                Forms\Components\Hidden::make('createdby')
                ->default(function (mixed $state){
                    return auth()->user()->id;
                }),
                Forms\Components\Actions::make([
                    Forms\Components\Actions\Action::make('Generate List')
                        ->action(function (Forms\Get $get, Forms\Set $set) {


                            // Delete PushList


                            $userid = $get('userid');
                            $datadate = $get('datadate');

                            //Get UserInfo
                            $userModel = new User();
                            $user = $userModel->where('id',$userid)->first();

                            $set('paketid',$user->acctype);

                            $brand = $user->brand;
                            $paketModel = new Paket();
                            $paket = $paketModel->where('id',$user->acctype)->first();

                            try{

                                $quota = $paket->quota;
                            } catch (ErrorException $e) {
                                $error = $e->getMessage();
                                Notification::make()->danger()->title("Please Check User Data")->icon('heroicon-o-check')->send();

                                return null;

                            }

                            // Delete
                            $templist = PushTemp::where('userid','=',$userid)->delete();

                            //Generate List
                            $pushList = Leads::query()->where('brand',$brand)->whereNotIn('id', function($q) use ($userid, $datadate){
                                $q->select('leadsid')->from('prospek')->where('userid',$userid);
                            }) ->whereDate('create','<=',$datadate)
                            ->orderBy('create','desc')
                            ->take($quota);

                           // dd($pushList->toRawSql());
                            // Save Temporary
                            foreach($pushList->get() as $list) {
                                $pushTemp = new PushTemp();
                                $pushTemp->userid = $userid;
                                $pushTemp->leadsid = $list->id;
                                $pushTemp->save();
                            }
                            Notification::make()->success()->title('Success')->icon('heroicon-o-check')->send();
                           // $livewire->dispatch('refreshForm');
                        })->after(function ($livewire) {
                            // ... Your action code
                            $livewire->dispatch('refreshExampleRelationManager');


                        }),
                ]),

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
                Tables\Columns\TextColumn::make('approveduser.nama')
                ->label('Approved'),
                //
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
                    Tables\Actions\DeleteBulkAction::make(),
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
