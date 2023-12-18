<?php

namespace App\Filament\Resources;

use App\Models\PushTemp;
use Filament\Forms;
use Filament\Tables;
use App\Models\Leads;
use App\Models\Invoice;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Infolists\Components;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InvoiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\PushlistRelationManager;
use App\Filament\Resources\InvoiceResource\RelationManagers\PushtempRelationManager;
use Livewire\Component;

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
                ->required(),
                Forms\Components\Select::make('paketid')
                ->label('Paket')
                ->relationship('pakets', 'name')
                ->required(),

                Forms\Components\Select::make('brand')
                ->label('Brand')
                ->relationship('brands', 'brand')
                ->searchable()
                ->preload()
                ->required(),

                Forms\Components\Hidden::make('tanggal')
                ->default(function (mixed $state){
                    //return Carbon::parse($tgl)->format('Y-m-d');
                    return date('Y-m-d H:i:s');
                }),
                Forms\Components\Hidden::make('createdby')
                ->default(function (mixed $state){
                    return auth()->user()->id;
                }),
                Forms\Components\Actions::make([
                    Forms\Components\Actions\Action::make('Generate List')
                        ->action(function (Forms\Get $get, Forms\Set $set) {


                            // Delete PushList


                            $userid = $get('userid');
                            $brand = $get('brand');

                            // Delete
                            $templist = PushTemp::where('userid','=',$userid)->delete();

                            //Generate List
                            $pushList = Leads::where('brand',$brand)->whereNotIn('id', function($q) use ($userid){
                                $q->select('leadsid')->from('prospek')->where('userid',$userid);
                            })
                            ->orderBy('create','desc')
                            ->take(10)
                            ->get();

                            // Save Temporary
                            foreach($pushList as $list) {
                                $pushTemp = new PushTemp();
                                $pushTemp->userid = $userid;
                                $pushTemp->leadsid = $list->id;
                                $pushTemp->save();
                            }

                           // $livewire->dispatch('refreshForm');
                        })->after( function(Component $livewire){
                            $livewire->dispatch('refreshProducts');
                        })
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
                Tables\Actions\ViewAction::make(),
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
            'view' => Pages\ViewInvoice::route('/{record}'),
        ];
    }
}
