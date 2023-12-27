<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Paket;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\PaketResource\Pages;

class PaketResource extends Resource
{
    protected static ?string $model = Paket::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'List Paket';
    protected static ?string $slug = 'paket-List';

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('paket_id')
                ->label('Paket ID'),
                Forms\Components\Select::make('type')
                ->label('Type')
                ->options([
                    'Retail' => 'Retail',
                    'Corporate' => 'Corporate',
                    'Banner' => 'Banner',
                ])
                ->rules(['required']),
                Forms\Components\TextInput::make('name')
                ->label('Name'),

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
                Tables\Columns\TextColumn::make('type')
                ->label('Type'),
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
                  //  Tables\Actions\DeleteBulkAction::make(),
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
