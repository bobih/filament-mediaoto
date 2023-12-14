<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CityResource\Pages;
use App\Models\City;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CityResource extends Resource
{
    protected static ?string $model = City::class;


    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $title = 'List Kota';

    protected static ?string $navigationLabel = 'List Kota';

    protected static ?string $slug = 'city-List';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('provinces_id')
                ->label('Provinsi')
                ->relationship('province', 'name')
                ->searchable()
                ->preload()
                ->required(),

                Forms\Components\TextInput::make('name')
                ->label('Kota')
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('province.name')->searchable()
                ->label('Provinsi'),
                Tables\Columns\TextColumn::make('name')->searchable()
                ->label('Kota'),
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
            'index' => Pages\ListCities::route('/'),
           // 'create' => Pages\CreateCity::route('/create'),
           // 'edit' => Pages\EditCity::route('/{record}/edit'),
        ];
    }
}
