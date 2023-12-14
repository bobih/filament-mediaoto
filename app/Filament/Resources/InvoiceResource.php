<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

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

                Forms\Components\Hidden::make('tanggal')
                ->default(function (mixed $state){
                    //return Carbon::parse($tgl)->format('Y-m-d');
                    return date('Y-m-d H:i:s');
                }),
                Forms\Components\Hidden::make('createdby')
                ->default(function (mixed $state){
                    //return Carbon::parse($tgl)->format('Y-m-d');
                    //dump($state);
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
                Tables\Columns\TextColumn::make('approveduser.nama')
                ->label('Approved'),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
