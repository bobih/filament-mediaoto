<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarTransmissionResource\Pages;
use App\Filament\Resources\CarTransmissionResource\RelationManagers;
use App\Models\CarTransmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarTransmissionResource extends Resource
{
    protected static ?string $model = CarTransmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')
                ->label('Transmission')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('ID'),
                Tables\Columns\TextColumn::make('name')->searchable()
                ->label('Transmission'),
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
            'index' => Pages\ListCarTransmissions::route('/'),
            'create' => Pages\CreateCarTransmission::route('/create'),
            'edit' => Pages\EditCarTransmission::route('/{record}/edit'),
        ];
    }
}
