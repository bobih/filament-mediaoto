<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarFuelResource\Pages;
use App\Filament\Resources\CarFuelResource\RelationManagers;
use App\Models\CarFuel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarFuelResource extends Resource
{
    protected static ?int $navigationSort = 4;
    protected static ?string $model = CarFuel::class;

    protected static ?string $navigationIcon = 'mdi-fuel';

    protected static ?string $navigationGroup = 'Info';

    protected static ?string $navigationLabel = 'Fuel List';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Forms\Components\TextInput::make('name')
                ->label('Fuel Type')
                ->required(),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')
                ->label('ID'),
                Tables\Columns\TextColumn::make('name')->searchable()
                ->label('Fuel Type'),
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
                   // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCarFuels::route('/'),
            'create' => Pages\CreateCarFuel::route('/create'),
            'edit' => Pages\EditCarFuel::route('/{record}/edit'),
        ];
    }
}
