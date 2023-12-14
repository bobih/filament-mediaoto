<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaketResource\Pages;
use App\Filament\Resources\PaketResource\RelationManagers;
use App\Models\Paket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaketResource extends Resource
{
    protected static ?string $model = Paket::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('paket_id')
                ->label('Paket ID'),
                Forms\Components\TextInput::make('name')
                ->label('Type'),
                Forms\Components\TextInput::make('quota')
                ->label('Quota'),
                Forms\Components\TextInput::make('harga')
                ->label('Harga')
                ,
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('paket_id')
                ->label('Paket ID'),
                Tables\Columns\TextColumn::make('name')->searchable()
                ->label('Nama'),
                Tables\Columns\TextColumn::make('quota')
                ->label('Quota'),
                Tables\Columns\TextColumn::make('harga')
                ->label('Harga')
                ->formatStateUsing(function (string $state): string{
                    return "Rp " . number_format($state,0,',','.');
                })

                ,
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
            'index' => Pages\ListPakets::route('/'),
            //'create' => Pages\CreatePaket::route('/create'),
            //'edit' => Pages\EditPaket::route('/{record}/edit'),
        ];
    }
}
